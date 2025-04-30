<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Golongan;
use Illuminate\Http\Request;
use PDF;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('golongan')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $golongan = Golongan::all();
        return view('mahasiswa.create', compact('golongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswa',
            'Nama' => 'required',
            'Semester' => 'required',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa created successfully.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $golongan = Golongan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'golongan'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'Nama' => 'required',
            'Semester' => 'required',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa deleted successfully');
    }

    public function generatePDF()
    {
        $mahasiswa = Mahasiswa::with('golongan')->get();
        $pdf = PDF::loadView('mahasiswa.pdf', compact('mahasiswa'));
        return $pdf->download('mahasiswa-list.pdf');
    }
}