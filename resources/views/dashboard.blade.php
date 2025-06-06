<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KurbanApp</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex">

    {{-- Sidebar --}}
    <div class="w-64 h-screen bg-green-800 text-white p-4 space-y-4">
        <h1 class="text-2xl font-bold">KurbanApp</h1>
        <a href="/" class="block p-2 bg-green-900 rounded">Dashboard</a>
        <a href="/hewan" class="block p-2 hover:bg-green-700 rounded">Data Hewan</a>
        <a href="#" class="block p-2 hover:bg-green-700 rounded">Pemeriksaan</a>
        <a href="#" class="block p-2 hover:bg-green-700 rounded">Laporan</a>
    </div>

    {{-- Main --}}
    <div class="flex-1 p-6 bg-gray-50">
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
                        <th class="p-2">Nama Hewan</th>
                        <th>Jenis</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hewans as $hewan)
                        <tr class="border-t">
                            <td class="p-2">{{ $hewan->nama }}</td>
                            <td>{{ $hewan->jenis }}</td>
                            <td>{{ $hewan->berat }} kg</td>
                            <td class="{{ $hewan->status == 'Layak' ? 'text-green-600' : 'text-red-600' }}">{{ $hewan->status }}</td>
                            <td><a href="{{ route('hewan.edit', $hewan->id) }}" class="text-blue-500">Periksa</a></td>
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

        {{-- Laporan --}}
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-xl font-bold mb-2">Laporan</h3>
            <form>
                <label>Periode</label>
                <select class="border p-2 rounded">
                    <option>April 2024</option>
                    <option>Mei 2024</option>
                </select>
                <button class="bg-green-800 text-white px-4 py-2 rounded ml-2">Tampilkan</button>
            </form>
        </div>
    </div>

</body>
</html>
