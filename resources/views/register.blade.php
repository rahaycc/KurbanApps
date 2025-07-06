@extends('layouts.auth')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="w-100" style="max-width: 400px;">
        <h2 class="text-center fw-bold mb-2">Daftar</h2>
        <p class="text-center text-muted mb-4">Masukkan Detail Anda</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-4">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Daftar</button>
        </form>
    </div>
</div>
@endsection
