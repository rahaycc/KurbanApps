@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-bold mb-4">Sistem Informasi Hewan Kurban</h2>

        {{-- Dashboard Card --}}
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-green-700 text-white p-4 rounded shadow">
                <div class="text-4xl">🐑</div>
                <div class="text-xl font-bold">{{ $total }}</div>
                <div>Total Hewan</div>
            </div>
            <div class="bg-green-600 text-white p-4 rounded shadow">
                <div class="text-4xl">✅</div>
                <div class="text-xl font-bold">{{ $layak }}</div>
                <div>Layak</div>
            </div>
            <div class="bg-green-900 text-white p-4 rounded shadow">
                <div class="text-4xl">❌</div>
                <div class="text-xl font-bold">{{ $tidak_layak }}</div>
                <div>Tidak Layak</div>
            </div>
        </div>

        {{-- Tabel Pemeriksaan --}}
        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-xl font-bold mb-2">Pemeriksaan</h3>
            <table class="w-full table-auto text-left border">
                <thead>
                    <tr class="bg-gray-200">
                        <th>No</th>
                        <th class="p-2">Nama Hewan</th>
                        <th>Jenis</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $i = 1;
                    @endphp
                    @foreach($hewans as $hewan)
                        <tr class="border-t">
                            <td>{{$i++}}</td>
                            <td class="p-2">{{ $hewan->nama }}</td>
                            <td>{{ $hewan->jenis }}</td>
                            <td>{{ $hewan->berat }} kg</td>
                            <td class="{{ $hewan->status == 'Layak' ? 'text-green-600' : 'text-red-600' }}">{{ $hewan->status }}</td>
                            <!-- <td><a href="{{ route('hewan.edit', $hewan->id) }}" class="text-blue-500">Periksa</a></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Form Pemeriksaan --}}
        @if(request()->routeIs('hewan.edit'))
        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-xl font-bold mb-2">Pemeriksaan</h3>
            <form action="{{ route('hewan.update', $hewan->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-2">
                    <label>Nama Hewan</label>
                    <input name="nama" value="{{ $hewan->nama }}" class="w-full border p-2 rounded" />
                </div>
                <div class="mb-2">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border p-2 rounded">
                        <option {{ $hewan->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                        <option {{ $hewan->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Kondisi Fisik</label>
                    <select name="kondisi_fisik" class="w-full border p-2 rounded">
                        <option {{ $hewan->kondisi_fisik == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                        <option {{ $hewan->kondisi_fisik == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="w-full border p-2 rounded">{{ $hewan->keterangan }}</textarea>
                </div>
                <button type="submit" class="bg-green-800 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
        @endif
@endsection