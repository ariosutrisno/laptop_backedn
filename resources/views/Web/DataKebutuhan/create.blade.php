<form method="post" action="{{ route('datakebutuhanstore') }}">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Kebutuhan</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="kebutuhan" name="kebutuhan" value="{{ old('kebutuhan') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">keterangan</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="keterangan " name="keterangan" value="{{ old('keterangan') }}">
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>