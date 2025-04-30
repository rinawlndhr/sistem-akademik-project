<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use PDF;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->get();
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();
        return view('krs.create', compact('mahasiswa', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Check if KRS already exists
        $exists = Krs::where('NIM', $request->NIM)
                      ->where('Kode_mk', $request->Kode_mk)
                      ->exists();
        
        if ($exists) {
            return redirect()->route('krs.create')
                ->with('error', 'KRS sudah ada untuk mahasiswa dan mata kuliah tersebut.');
        }

        Krs::create($request->all());

        return redirect()->route('krs.index')
            ->with('success', 'KRS created successfully.');
    }

    public function show(Krs $krs)
    {
        $krs->load('mahasiswa', 'matakuliah');
        return view('krs.show', compact('krs'));
    }

    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswa', 'matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        $dataEdit = [
            'NIM'=> $request->NIM,
            'Kode_mk'=>$request->Kode_mk,
        ];
        Krs::where('id', $id)->update($dataEdit);
        
        return redirect()->route('krs.index')->with('message', 'Edit Data berhasil..');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('krs.index')
            ->with('success', 'KRS deleted successfully');
    }

    public function generatePDF()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->get();
        $pdf = PDF::loadView('krs.pdf', compact('krs'));
        return $pdf->download('krs-list.pdf');
    }
}