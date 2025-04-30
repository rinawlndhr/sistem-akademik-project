<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|unique:matakuliah',
            'Nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Matakuliah created successfully.');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'Nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Matakuliah updated successfully');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Matakuliah deleted successfully');
    }

    public function generatePDF()
    {
        $matakuliah = Matakuliah::all();
        $pdf = PDF::loadView('matakuliah.pdf', compact('matakuliah'));
        return $pdf->download('matakuliah-list.pdf');
    }
}