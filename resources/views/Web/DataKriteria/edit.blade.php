<input type="hidden" value="{{ $data->idx_kriteria }}" id="idx_kriteria">
<div class="form-group">
    <label for="exampleFormControlInput1">No. Kritera</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No. kriteria " name="kriteria_id" value="{{ $data->kriteria_id }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nama Kriteria</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kriteria " name="nama_kriteria" value="{{ $data->nama_kriteria }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Deskripsi</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Deskripsi" name="deskripsi" value="{{ $data->deskripsi }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Bobot</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="bobot" name="bobot" value="{{ $data->bobot }}">
</div>