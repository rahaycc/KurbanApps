@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Data Hewan</h1>

    <form method="POST" action="{{ route('hewan.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nama Hewan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Hewan</label>
            <input type="text" name="jenis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat (Kg)</label>
            <input type="number" name="berat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mata</label>
            <select name="mata" class="form-control">
                <option value="sehat">Sehat</option>
                <option value="tidak sehat">Tidak Sehat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Hidung</label>
            <select name="hidung" class="form-control">
                <option value="sehat">Sehat</option>
                <option value="tidak sehat">Tidak Sehat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Mulut</label>
            <select name="mulut" class="form-control">
                <option value="sehat">Sehat</option>
                <option value="tidak sehat">Tidak Sehat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanduk</label>
            <select name="tanduk" class="form-control">
                <option value="sehat">Sehat</option>
                <option value="tidak sehat">Tidak Sehat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kaki</label>
            <select name="kaki" class="form-control">
                <option value="sehat">Sehat</option>
                <option value="tidak sehat">Tidak Sehat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Pernafasan</label>
            <select name="pernafasan" class="form-control">
                <option value="normal">Normal</option>
                <option value="tidak normal">Tidak Normal</option>

            </select>
        </div>
        <div class="mb-3">
            <label>Feses</label>
            <select name="feses" class="form-control">
                <option value="normal">Normal</option>
                <option value="tidak normal">Tidak Normal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
