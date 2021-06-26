<form action="{{ route('DataPostRekomen') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Merk Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Merk Laptop" name="merk" value="{{ old('merk') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Tipe Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tipe Laptop" name="tipe" value="{{ old('tipe') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Harga Laptop" name="harga" value="{{ old('harga') }}">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>