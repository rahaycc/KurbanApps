@extends('layouts.auth')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="bg-white p-5 rounded shadow text-center" style="width: 100%; max-width: 400px;">
        <h2 class="fw-bold mb-2">Selamat Datang</h2>
        <p class="text-muted mb-4">Daftar atau Masuk untuk mengakses semua fitur</p>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <input type="email" name="email" class="form-control" placeholder="email" required>
            </div>

            <div class="mb-4 text-start">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-outline-dark w-50">Masuk</button>
                <a href="{{ route('register') }}" class="btn btn-dark w-50">Daftar</a>
            </div>
        </form>
    </div>
</div>
@endsection
