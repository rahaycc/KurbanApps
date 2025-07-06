@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-bold">Data Hewan Kurban</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah" id="btnTambahHewan">
        Tambah Hewan
    </button>

    <!-- Tabel Hewan -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Umur</th>
                    <th>Berat</th>
                    <th>Poel</th>
                    <th>Skor</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hewans as $i => $hewan)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $hewan->nama }}</td>
                    <td>{{ $hewan->jenis_hewan }}</td>
                    <td>{{ $hewan->umur }}</td>
                    <td>{{ $hewan->berat }} kg</td>
                    <td>{{ $hewan->poel }}</td>
                    <td>{{ $hewan->skor }}%</td>
                    <td>
                        <span class="badge bg-{{ $hewan->status == 'Layak' ? 'success' : 'danger' }}">
                            {{ $hewan->status }}
                        </span>
                    </td>
                    <td>
                        <!-- Tombol Periksa -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalPeriksa{{ $hewan->id }}">
                            Periksa
                        </button>

                        <!-- Hapus -->
                        <form action="{{ route('hewan.destroy', $hewan->id) }}" method="POST" class="d-inline form-delete">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Periksa -->
                <div class="modal fade" id="modalPeriksa{{ $hewan->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('hewan.update', $hewan->id) }}" method="POST">
                                @csrf @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Periksa Hewan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama</label>
                                        <input name="nama" class="form-control" value="{{ $hewan->nama }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jenis</label>
                                        <select name="jenis" class="form-select" required>
                                            <option value="Sapi" {{ $hewan->jenis_hewan == 'Sapi' ? 'selected' : '' }}>Sapi</option>
                                            <option value="Kambing" {{ $hewan->jenis_hewan == 'Kambing' ? 'selected' : '' }}>Kambing</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Umur</label>
                                        <input type="number" name="umur" class="form-control" value="{{ $hewan->umur }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Berat</label>
                                        <input type="number" name="berat" class="form-control" value="{{ $hewan->berat }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenisKelamin" class="form-select">
                                            <option {{ $hewan->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                                            <option {{ $hewan->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Warna</label>
                                        <input name="warna" class="form-control" value="{{ $hewan->warna }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Poel</label>
                                        <input name="poel" class="form-control" value="{{ $hewan->poel }}">
                                    </div>

                                    @foreach(['mata', 'kaki', 'tanduk', 'ekor', 'telinga'] as $part)
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize">{{ ucfirst($part) }}</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $part }}" value="sehat"
                                            {{ $hewan->$part == 'sehat' ? 'checked' : '' }} required>
                                            <label class="form-check-label">Sehat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="{{ $part }}" value="tidak sehat"
                                            {{ $hewan->$part == 'tidak sehat' ? 'checked' : '' }}>
                                            <label class="form-check-label">Tidak Sehat</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($hewans->isEmpty())
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada data.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah (Disamakan Struktur) -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('hewan.store') }}" method="POST" id="formTambah">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Hewan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-select" required>
                                <option value="Sapi">Sapi</option>
                                <option value="Kambing">Kambing</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" name="umur" id="umur" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="berat" class="form-label">Berat</label>
                            <input type="number" name="berat" id="berat" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenisKelamin" id="jenisKelamin" class="form-select" required>
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="warna" class="form-label">Warna</label>
                            <select name="warna" id="warna" class="form-select" required>
                                <option value="Putih">Putih</option>
                                <option value="Hitam">Hitam</option>
                                <option value="Putih dengan Corak lain">Putih dengan Corak lain</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="poel" class="form-label">Poel</label>
                            <input type="text" name="poel" id="poel" class="form-control">
                        </div>

                        @foreach(['mata', 'kaki', 'tanduk', 'ekor', 'telinga'] as $part)
                            <div class="col-md-6">
                                <label class="form-label">{{ ucfirst($part) }}</label>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $part }}" value="sehat" id="{{ $part }}_sehat" required>
                                        <label class="form-check-label" for="{{ $part }}_sehat">Sehat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $part }}" value="tidak sehat" id="{{ $part }}_tidak">
                                        <label class="form-check-label" for="{{ $part }}_tidak">Tidak Sehat</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Script Reset Modal --}}
<script>
    document.getElementById('btnTambahHewan').addEventListener('click', function () {
        // Reset form value
        const fields = ['nama', 'jenis', 'umur', 'berat', 'jenisKelamin', 'warna', 'poel'];
        fields.forEach(id => document.getElementById(id).value = '');

        // Uncheck radio buttons
        ['mata', 'kaki', 'tanduk', 'ekor', 'telinga'].forEach(part => {
            document.getElementById(`${part}_sehat`).checked = false;
            document.getElementById(`${part}_tidak`).checked = false;
        });
    });
</script>
@endsection
