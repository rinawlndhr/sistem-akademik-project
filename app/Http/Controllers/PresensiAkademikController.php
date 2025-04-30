<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class PresensiAkademikController extends Controller
{
    public function index(Request $request)
    {
        $query = PresensiAkademik::with(['mahasiswa', 'matakuliah']);

        // Search functionality
        if ($request->has('search_nim') && !empty($request->search_nim)) {
            $search_nim = $request->search_nim;
            $query->whereHas('mahasiswa', function($q) use ($search_nim) {
                $q->where('NIM', 'like', '%' . $search_nim . '%')
                  ->orWhere('Nama', 'like', '%' . $search_nim . '%');
            });
        }

        if ($request->has('search_matkul') && !empty($request->search_matkul)) {
            $search_matkul = $request->search_matkul;
            $query->whereHas('matakuliah', function($q) use ($search_matkul) {
                $q->where('Kode_mk', 'like', '%' . $search_matkul . '%')
                  ->orWhere('Nama_mk', 'like', '%' . $search_matkul . '%');
            });
        }

        if ($request->has('search_tanggal') && !empty($request->search_tanggal)) {
            $query->whereDate('tanggal', $request->search_tanggal);
        }

        if ($request->has('search_status') && !empty($request->search_status)) {
            $query->where('status_kehadiran', $request->search_status);
        }

        $presensi_akademik = $query->get();
        
        return view('presensi_akademik.index', compact('presensi_akademik'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();
        $status_kehadiran = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        return view('presensi_akademik.create', compact('mahasiswa', 'matakuliah', 'status_kehadiran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);
        
        // Mengambil data request dan menambahkan jam masuk & keluar otomatis
        $data = $request->all();
        $data['jam_masuk'] = date('H:i:s');
        $data['jam_keluar'] = date('H:i:s', strtotime('+2 hours')); // Default 2 jam setelah masuk
        
        // Mengisi kolom hari otomatis dari tanggal
        $namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $dayOfWeek = date('w', strtotime($request->tanggal));
        $data['hari'] = $namaHari[$dayOfWeek];
        
        PresensiAkademik::create($data);

        return redirect()->route('presensi_akademik.index')
            ->with('success', 'Presensi Akademik created successfully.');
    }

    public function show(PresensiAkademik $presensi_akademik)
    {
        return view('presensi_akademik.show', compact('presensi_akademik'));
    }

    public function edit(PresensiAkademik $presensi_akademik)
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();
        $status_kehadiran = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        return view('presensi_akademik.edit', compact('presensi_akademik', 'mahasiswa', 'matakuliah', 'status_kehadiran'));
    }

    public function update(Request $request, PresensiAkademik $presensi_akademik)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);
        
        // Mengambil data request
        $data = $request->all();
        
        // Jika jam masuk dan keluar tidak diisi, biarkan nilai lama tetap ada
        if (!isset($data['jam_masuk'])) {
            $data['jam_masuk'] = $presensi_akademik->jam_masuk;
        }
        
        if (!isset($data['jam_keluar'])) {
            $data['jam_keluar'] = $presensi_akademik->jam_keluar;
        }
        
        // Mengisi kolom hari otomatis dari tanggal
        $namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $dayOfWeek = date('w', strtotime($request->tanggal));
        $data['hari'] = $namaHari[$dayOfWeek];
        
        $presensi_akademik->update($data);

        return redirect()->route('presensi_akademik.index')
            ->with('success', 'Presensi Akademik updated successfully');
    }

    public function destroy(PresensiAkademik $presensi_akademik)
    {
        $presensi_akademik->delete();

        return redirect()->route('presensi_akademik.index')
            ->with('success', 'Presensi Akademik deleted successfully');
    }

    public function generatePDF(Request $request)
    {
        // Use the same search parameters as the index method
        $query = PresensiAkademik::with(['mahasiswa', 'matakuliah']);

        if ($request->has('search_nim') && !empty($request->search_nim)) {
            $search_nim = $request->search_nim;
            $query->whereHas('mahasiswa', function($q) use ($search_nim) {
                $q->where('NIM', 'like', '%' . $search_nim . '%')
                  ->orWhere('Nama', 'like', '%' . $search_nim . '%');
            });
        }

        if ($request->has('search_matkul') && !empty($request->search_matkul)) {
            $search_matkul = $request->search_matkul;
            $query->whereHas('matakuliah', function($q) use ($search_matkul) {
                $q->where('Kode_mk', 'like', '%' . $search_matkul . '%')
                  ->orWhere('Nama_mk', 'like', '%' . $search_matkul . '%');
            });
        }

        if ($request->has('search_tanggal') && !empty($request->search_tanggal)) {
            $query->whereDate('tanggal', $request->search_tanggal);
        }

        if ($request->has('search_status') && !empty($request->search_status)) {
            $query->where('status_kehadiran', $request->search_status);
        }

        $presensi_akademik = $query->get();
        
        $pdf = PDF::loadView('presensi_akademik.pdf', compact('presensi_akademik'));
        return $pdf->download('presensi-akademik-list.pdf');
    }
}