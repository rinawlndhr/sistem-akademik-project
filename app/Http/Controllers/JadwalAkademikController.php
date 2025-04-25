<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;
use PDF;

class JadwalAkademikController extends Controller
{
    public function index()
    {
        $jadwal_akademik = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        return view('jadwal_akademik.index', compact('jadwal_akademik'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        return view('jadwal_akademik.create', compact('matakuliah', 'ruangs', 'golongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        JadwalAkademik::create($request->all());

        return redirect()->route('jadwal_akademik.index')
            ->with('success', 'Jadwal Akademik created successfully.');
    }

    public function show(JadwalAkademik $jadwal_akademik)
    {
        return view('jadwal_akademik.show', compact('jadwal_akademik'));
    }

    public function edit(JadwalAkademik $jadwal_akademik)
    {
        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        return view('jadwal_akademik.edit', compact('jadwal_akademik', 'matakuliah', 'ruangs', 'golongans'));
    }

    public function update(Request $request, JadwalAkademik $jadwal_akademik)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        $jadwal_akademik->update($request->all());

        return redirect()->route('jadwal_akademik.index')
            ->with('success', 'Jadwal Akademik updated successfully');
    }

    public function destroy(JadwalAkademik $jadwal_akademik)
    {
        $jadwal_akademik->delete();

        return redirect()->route('jadwal_akademik.index')
            ->with('success', 'Jadwal Akademik deleted successfully');
    }

    public function generatePDF()
    {
        $jadwal_akademik = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        $pdf = PDF::loadView('jadwal_akademik.pdf', compact('jadwal_akademik'));
        return $pdf->download('jadwal-akademik-list.pdf');
    }
}