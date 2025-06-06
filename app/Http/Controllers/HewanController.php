<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HewanController extends Controller
{
    public function index()
    {
        $hewans = Hewan::all();
        return view('hewan.index', compact('hewans'));
    }

    public function create()
    {
        return view('hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'berat' => 'required|integer',
            'mata' => 'required',
            'hidung' => 'required',
            'mulut' => 'required',
            'tanduk' => 'required',
            'kaki' => 'required',
            'pernafasan' => 'required',
            'feses' => 'required',
        ]);

        $status = 'Layak';

        if (
            $request->mata != 'sehat' ||
            $request->hidung != 'sehat' ||
            $request->mulut != 'sehat' ||
            $request->tanduk != 'sehat' ||
            $request->kaki != 'sehat' ||
            $request->pernafasan != 'normal' ||
            $request->feses != 'normal'
        ) {
            $status = 'Tidak Layak';
        }

        $jenis = strtolower(trim($request->jenis));

        // Cek berat minimum berdasarkan jenis hewan
        if (
            ($jenis == 'kambing' && $request->berat < 20) ||
            ($jenis == 'sapi' && $request->berat < 200)
        ) {
            $status = 'Tidak Layak';
        }

        Hewan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'mata' => $request->mata,
            'hidung' => $request->hidung,
            'mulut' => $request->mulut,
            'tanduk' => $request->tanduk,
            'kaki' => $request->kaki,
            'pernafasan' => $request->pernafasan,
            'feses' => $request->feses,
            'status' => $status,
        ]);

        return redirect()->route('hewan.index')->with('success', 'Data Hewan Berhasil Ditambahkan.');
    }

    public function edit($id)
{
    $hewan = Hewan::findOrFail($id);
    return view('hewan.edit', compact('hewan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jenis' => 'required',
        'berat' => 'required|numeric',
        'mata' => 'required',
        'hidung' => 'required',
        'mulut' => 'required',
        'tanduk' => 'required',
        'kaki' => 'required',
        'pernafasan' => 'required',
        'feses' => 'required',
    ]);

    $status = 'Layak';

    // Cek kesehatan
    if (
        $request->mata != 'sehat' ||
        $request->hidung != 'sehat' ||
        $request->mulut != 'sehat' ||
        $request->tanduk != 'sehat' ||
        $request->kaki != 'sehat' ||
        $request->pernafasan != 'normal' ||
        $request->feses != 'normal'
    ) {
        $status = 'Tidak Layak';
    }

    // Cek berat minimal
    $jenis = strtolower(trim($request->jenis));
    if (
        ($jenis == 'kambing' && $request->berat < 20) ||
        ($jenis == 'sapi' && $request->berat < 200)
    ) {
        $status = 'Tidak Layak';
    }

    $hewan = Hewan::findOrFail($id);

    $hewan->update([
        'nama' => $request->nama,
        'jenis' => $request->jenis,
        'berat' => $request->berat,
        'mata' => $request->mata,
        'hidung' => $request->hidung,
        'mulut' => $request->mulut,
        'tanduk' => $request->tanduk,
        'kaki' => $request->kaki,
        'pernafasan' => $request->pernafasan,
        'feses' => $request->feses,
        'status' => $status,
    ]);

    return redirect()->route('hewan.index')->with('success', 'Data berhasil diperbarui.');
}


}

