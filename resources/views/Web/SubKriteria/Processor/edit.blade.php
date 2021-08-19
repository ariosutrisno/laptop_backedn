`
<input type="hidden" value="{{ $data->idx_processor }}" id="idx_processor">
<div class="form-group">
    <label for="exampleFormControlInput1">Nilai</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nilai" name="nilai_hasil" value="{{ $data->nilai_processor }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Keterangan</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Keterangan" name="keterangan" value="{{ $data->processor }}">
</div>