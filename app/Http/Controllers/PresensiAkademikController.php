<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class PresensiAkademikController extends Controller
{
    public function index()
    {
        $presensi_akademik = PresensiAkademik::with(['mahasiswa', 'matakuliah'])->get();
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
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        PresensiAkademik::create($request->all());

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
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        $presensi_akademik->update($request->all());

        return redirect()->route('presensi_akademik.index')
            ->with('success', 'Presensi Akademik updated successfully');
    }

    public function destroy(PresensiAkademik $presensi_akademik)
    {
        $presensi_akademik->delete();

        return redirect()->route('presensi_akademik.index')
            ->with('success', 'Presensi Akademik deleted successfully');
    }

    public function generatePDF()
    {
        $presensi_akademik = PresensiAkademik::with(['mahasiswa', 'matakuliah'])->get();
        $pdf = PDF::loadView('presensi_akademik.pdf', compact('presensi_akademik'));
        return $pdf->download('presensi-akademik-list.pdf');
    }
}