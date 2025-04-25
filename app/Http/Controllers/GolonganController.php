<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongans = Golongan::all();
        return view('golongan.index', compact('golongan'));
    }

    public function create()
    {
        return view('golongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_Gol' => 'required|unique:golongan',
            'nama_Gol' => 'required',
        ]);

        Golongan::create($request->all());

        return redirect()->route('golongan.index')
            ->with('success', 'Golongan created successfully.');
    }

    public function show(Golongan $golongan)
    {
        return view('golongan.show', compact('golongan'));
    }

    public function edit(Golongan $golongan)
    {
        return view('golongan.edit', compact('golongan'));
    }

    public function update(Request $request, Golongan $golongan)
    {
        $request->validate([
            'nama_Gol' => 'required',
        ]);

        $golongan->update($request->all());

        return redirect()->route('golongan.index')
            ->with('success', 'Golongan updated successfully');
    }

    public function destroy(Golongan $golongan)
    {
        $golongan->delete();

        return redirect()->route('golongan.index')
            ->with('success', 'Golongan deleted successfully');
    }
}