<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliahs.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliahs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|unique:matakuliahs',
            'Nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliahs.index')
            ->with('success', 'Matakuliah created successfully.');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliahs.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliahs.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'Nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliahs.index')
            ->with('success', 'Matakuliah updated successfully');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliahs.index')
            ->with('success', 'Matakuliah deleted successfully');
    }

    public function generatePDF()
    {
        $matakuliahs = Matakuliah::all();
        $pdf = PDF::loadView('matakuliahs.pdf', compact('matakuliahs'));
        return $pdf->download('matakuliah-list.pdf');
    }
}