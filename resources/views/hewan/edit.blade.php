@extends('layouts.app')

@section('content')
<h3>Edit Pemeriksaan Hewan</h3>
<form action="{{ route('hewan.update', $hewan->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('hewan.form')
</form>
@endsection
