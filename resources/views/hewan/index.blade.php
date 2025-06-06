@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Hewan</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary" style="margin-bottom: 10px;">
        ← Kembali ke Dashboard
    </a>

    <a href="{{ route('hewan.create') }}" class="btn btn-success mb-3">Tambah Hewan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Berat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hewans as $hewan)
            <tr>
                <td>{{ $hewan->nama }}</td>
                <td>{{ $hewan->jenis }}</td>
                <td>{{ $hewan->berat }} kg</td>
                <td>
                    @if ($hewan->status == 'Layak')
                        <span class="badge bg-success">Layak</span>
                    @else
                        <span class="badge bg-danger">Tidak Layak</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
