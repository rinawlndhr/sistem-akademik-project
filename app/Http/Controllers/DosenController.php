<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use PDF;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:dosen',
            'Nama' => 'required',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'Dosen created successfully.');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'Nama' => 'required',
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'Dosen updated successfully');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Dosen deleted successfully');
    }

    public function generatePDF()
    {
        $dosen = Dosen::all();
        $pdf = PDF::loadView('dosen.pdf', compact('dosen'));
        return $pdf->download('dosen-list.pdf');
    }
}