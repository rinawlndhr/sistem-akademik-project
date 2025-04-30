<?php

namespace App\Http\Controllers;

use App\Models\Pengampu;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PengampuController extends Controller
{
    public function index()
    {
        $pengampu = Pengampu::with(['dosen', 'matakuliah'])->get();
        return view('pengampu.index', compact('pengampu'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('pengampu.create', compact('dosen', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|exists:dosen,NIP',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Check if combination already exists
        $exists = Pengampu::where('NIP', $request->NIP)
                          ->where('Kode_mk', $request->Kode_mk)
                          ->exists();
        
        if ($exists) {
            return redirect()->route('pengampu.create')
                ->with('error', 'Pengampu dengan dosen dan mata kuliah tersebut sudah ada.');
        }

        // Mencari ID tertinggi dan menambahkan 1
        $maxId = DB::table('pengampu')->max('id') ?? 0;
        $newId = $maxId + 1;
        
        // Buat array data dengan id yang eksplisit
        $data = $request->all();
        $data['id'] = $newId;
        
        // Simpan data
        Pengampu::create($data);

        return redirect()->route('pengampu.index')
            ->with('success', 'Pengampu created successfully.');
    }

    public function show(Pengampu $pengampu)
    {
        return view('pengampu.show', compact('pengampu'));
    }

    public function edit(Pengampu $pengampu)
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('pengampu.edit', compact('pengampu', 'dosen', 'matakuliah'));
    }

    public function update(Request $request, Pengampu $pengampu)
    {
        $request->validate([
            'NIP' => 'required|exists:dosen,NIP',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Check if combination already exists (except current one)
        $exists = Pengampu::where('NIP', $request->NIP)
                          ->where('Kode_mk', $request->Kode_mk)
                          ->where('id', '!=', $pengampu->id)
                          ->exists();
        
        if ($exists) {
            return redirect()->route('pengampu.edit', $pengampu->id)
                ->with('error', 'Pengampu dengan dosen dan mata kuliah tersebut sudah ada.');
        }

        $pengampu->update($request->all());

        return redirect()->route('pengampu.index')
            ->with('success', 'Pengampu updated successfully');
    }

    public function destroy(Pengampu $pengampu)
    {
        $pengampu->delete();

        return redirect()->route('pengampu.index')
            ->with('success', 'Pengampu deleted successfully');
    }

    public function generatePDF()
    {
        $pengampu = Pengampu::with(['dosen', 'matakuliah'])->get();
        $pdf = PDF::loadView('pengampu.pdf', compact('pengampu'));
        return $pdf->download('pengampu-list.pdf');
    }
}