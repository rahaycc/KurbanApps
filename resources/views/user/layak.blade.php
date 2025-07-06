@extends('layouts.user')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard-user') }}" class="btn btn-outline-secondary">
            &larr; Kembali
        </a>
        <h2 class="fw-bold text-center flex-grow-1 me-5">Daftar Hewan Kurban Layak</h2>
    </div>

    <div class="row">
        @forelse($hewans as $hewan)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $hewan->nama }}</h5>
                        <p class="card-text">
                            <strong>Jenis:</strong> {{ $hewan->jenis }}<br>
                            <strong>Umur:</strong> {{ $hewan->umur }} tahun<br>
                            <strong>Berat:</strong> {{ $hewan->berat }} kg<br>
                            <strong>Jenis Kelamin:</strong> {{ $hewan->jenis_kelamin }}<br>
                            <strong>Warna:</strong> {{ $hewan->warna }}<br>
                            <strong>Poel:</strong> {{ $hewan->poel }}<br>
                            <strong>Status:</strong> 
                            <span class="text-success">{{ $hewan->status }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada hewan layak.</p>
        @endforelse
    </div>
@endsection
