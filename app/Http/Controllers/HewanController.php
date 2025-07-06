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
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required|integer',
            'berat' => 'required|integer',
            'jenisKelamin' => 'required',
            'warna' => 'required',
            'poel' => 'required|integer',
            'mata' => 'required',
            'kaki' => 'required',
            'tanduk' => 'required',
            'ekor' => 'required',
            'telinga' => 'required',
        ]);

        $score = 0;

        // 1. Umur ≥ 2 tahun → 20%
        if ($request->umur >= 2) {
            $score += 20;
        }

        // 2. Berat sesuai jenis → 15%
        $jenis = strtolower(trim($request->jenis));
        if (
            ($jenis === 'sapi' && $request->berat >= 200) ||
            ($jenis === 'kambing' && $request->berat >= 20)
        ) {
            $score += 15;
        }

        // 3. Semua Kesehatan = sehat → 25%
        $semua_sehat = !in_array('tidak sehat', [
            $request->mata,
            $request->kaki,
            $request->tanduk,
            $request->ekor,
            $request->telinga,
        ]);

        if ($semua_sehat) {
            $score += 25;
        }

        // 4. Jenis kelamin jantan → 10%
        if (strtolower($request->jenisKelamin) === 'jantan') {
            $score += 10;
        }

        // 5. Warna bukan hitam → 10%
        if (strtolower($request->warna) !== 'hitam') {
            $score += 10;
        }

        // 6. Poel > 2 → 20%
        if ($request->poel >= 2) {
            $score += 20;
        }

        // Tentukan status berdasarkan skor total
        $status = $score === 100 ? 'Layak' : 'Tidak Layak';

        // Simpan ke database
        Hewan::create([
            'nama' => $request->nama,
            'jenis_hewan' => $request->jenis,
            'jenis_kelamin' => $request->jenisKelamin,
            'umur' => $request->umur,
            'berat' => $request->berat,
            'warna' => $request->warna,
            'poel' => $request->poel,
            'mata' => $request->mata,
            'kaki' => $request->kaki,
            'tanduk' => $request->tanduk,
            'ekor' => $request->ekor,
            'telinga' => $request->telinga,
            'status' => $status,
            'skor' => $score,
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
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'umur' => 'required|integer',
            'berat' => 'required|integer',
            'jenisKelamin' => 'required',
            'warna' => 'required',
            'poel' => 'required|integer',
            'mata' => 'required',
            'kaki' => 'required',
            'tanduk' => 'required',
            'ekor' => 'required',
            'telinga' => 'required',
        ]);

        $score = 0;
        $status = 'Layak';

        // 1. Umur ≥ 2 tahun → 20%
        if ($request->umur >= 2) {
            $score += 20;
        }

        // 2. Berat sesuai jenis → 15%
        $jenis = strtolower(trim($request->jenis));
        if (
            ($jenis === 'sapi' && $request->berat >= 200) ||
            ($jenis === 'kambing' && $request->berat >= 20)
        ) {
            $score += 15;
        }

        // 3. Semua Kesehatan = sehat → 25%
        $kesehatan_lengkap = !in_array('tidak sehat', [
            $request->mata,
            $request->kaki,
            $request->tanduk,
            $request->ekor,
            $request->telinga,
        ]);
        if ($kesehatan_lengkap) {
            $score += 25;
        }

        // 4. Jenis kelamin jantan → 10%
        if (strtolower($request->jenisKelamin) === 'jantan') {
            $score += 10;
        }

        // 5. Warna bukan hitam → 10%
        if (strtolower($request->warna) !== 'hitam') {
            $score += 10;
        }

        // 6. Poel > 2 → 20%
        if ((int)$request->poel >= 2) {
            $score += 20;
        }

        // Status hanya Layak jika skor == 100
        if ($score < 100) {
            $status = 'Tidak Layak';
        }

        $hewan = Hewan::findOrFail($id);

        $hewan->update([
            'nama' => $request->nama,
            'jenis_hewan' => $request->jenis,
            'jenis_kelamin' => $request->jenisKelamin,
            'umur' => $request->umur,
            'berat' => $request->berat,
            'warna' => $request->warna,
            'poel' => $request->poel,
            'mata' => $request->mata,
            'kaki' => $request->kaki,
            'tanduk' => $request->tanduk,
            'ekor' => $request->ekor,
            'telinga' => $request->telinga,
            'status' => $status,
            'skor' => $score,
        ]);

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $hewan = Hewan::findOrFail($id);
        $hewan->delete();

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus.');
    }


    public function getLayak(){
        $hewans = Hewan::where('status', 'Layak')->get();
        return view('user.layak', compact('hewans'));
    }


    

}

