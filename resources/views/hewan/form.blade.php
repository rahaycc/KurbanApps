@csrf

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $hewan->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control" value="{{ old('jenis', $hewan->jenis ?? '') }}">
</div>

<div class="mb-3">
    <label>Berat (kg)</label>
    <input type="number" name="berat" class="form-control" value="{{ old('berat', $hewan->berat ?? '') }}">
</div>

<div class="mb-3">
    <label>Mata</label>
    <input type="text" name="mata" class="form-control" value="{{ old('mata', $hewan->mata ?? '') }}">
</div>

<div class="mb-3">
    <label>Hidung</label>
    <input type="text" name="hidung" class="form-control" value="{{ old('hidung', $hewan->hidung ?? '') }}">
</div>

<div class="mb-3">
    <label>Mulut</label>
    <input type="text" name="mulut" class="form-control" value="{{ old('mulut', $hewan->mulut ?? '') }}">
</div>

<div class="mb-3">
    <label>Tanduk</label>
    <input type="text" name="tanduk" class="form-control" value="{{ old('tanduk', $hewan->tanduk ?? '') }}">
</div>

<div class="mb-3">
    <label>Kaki</label>
    <input type="text" name="kaki" class="form-control" value="{{ old('kaki', $hewan->kaki ?? '') }}">
</div>

<div class="mb-3">
    <label>Pernapasan</label>
    <input type="text" name="pernafasan" class="form-control" value="{{ old('pernafasan', $hewan->pernafasan ?? '') }}">
</div>

<div class="mb-3">
    <label>Feses</label>
    <input type="text" name="feses" class="form-control" value="{{ old('feses', $hewan->feses ?? '') }}">
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="Layak" {{ (old('status', $hewan->status ?? '') == 'Layak') ? 'selected' : '' }}>Layak</option>
        <option value="Tidak Layak" {{ (old('status', $hewan->status ?? '') == 'Tidak Layak') ? 'selected' : '' }}>Tidak Layak</option>
    </select>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
