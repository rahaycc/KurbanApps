@extends('layouts.user')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 flex-column text-center">
    <h2 class="fw-bold mb-3">Lihat Hewan Kurban Layak</h2>
    <a href="{{ route('hewan.layak') }}" class="btn btn-dark">Lihat</a>
</div>
@endsection
