@extends('layouts.app')
@section('content')
<div class="bg-white p-4 rounded shadow">
    <h3 class="text-xl font-bold mb-2">Laporan</h3>
    <form class="d-flex align-items-center">
        <label class="me-2">Periode</label>
        <input type="text" id="date-range" class="form-control me-2" placeholder="Select date range">

        <label class="me-2">Status</label>
        <select id="status-filter" class="form-control me-2">
            <option value="">Semua</option>
            <option value="Layak">Layak</option>
            <option value="Tidak Layak">Tidak Layak</option>
        </select>

        <button type="button" id="export-button" class="btn btn-primary">
            Export Report
        </button>
    </form>
</div>


@endsection