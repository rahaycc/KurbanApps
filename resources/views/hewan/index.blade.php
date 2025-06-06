@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Data Hewan</h1>


    <!-- Tombol buka modal -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahHewan">
        Tambah Hewan
    </button>

    <!-- Table data -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Berat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @forelse ($hewans as $hewan)
                <tr>
                    <td>{{$i++}}</td>
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
                    <td>
                        <a href="{{ route('hewan.edit', $hewan->id) }}" class="btn btn-warning">Periksa</a>

                        <!-- Tombol hapus -->
                        <form action="{{ route('hewan.destroy', $hewan->id) }}" method="POST" class="d-inline form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data hewan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalTambahHewan" tabindex="-1" aria-labelledby="modalTambahHewanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg biar lebar -->
        <div class="modal-content">
            <form method="POST" action="{{ route('hewan.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahHewanLabel">Tambah Hewan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Hewan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Jenis Hewan</label>
                        <select name="jenis" class="form-control" required>
                            <option value="Sapi">Sapi</option>
                            <option value="Kambing">Kambing</option>
                        </select>
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
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
