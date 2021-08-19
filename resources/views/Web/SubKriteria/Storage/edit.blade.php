
<input type="hidden" value="{{ $data->idx_storage }}" id="idx_storage">
<div class="form-group">
    <label for="exampleFormControlInput1">Nilai</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nilai" name="nilai_hasil" value="{{ $data->nilai_storage }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Keterangan</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Keterangan" name="keterangan" value="{{ $data->storage }}">
</div>