<form method="POST" action="{{ route('DataLaptopPOST') }}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Merk Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Merk Laptop" name="merek" value="{{ old('merek') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Tipe Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tipe Laptop" name="tipe" value="{{ old('tipe') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">RAM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="RAM" name="ram" value="{{ old('ram') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Processor</label> 
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Processor" name="processor" value="{{ old('processor') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Display</label> 
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Display" name="display" value="{{ old('display') }}">
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlInput1">Storage</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Storage" name="storage" value="{{ old('storage') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">VGA Card</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="VGA Card" name="vga" value="{{ old('vga') }}">
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Harga Laptop" name="harga" value="{{ old('harga') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Gambar Laptop</label>
        <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" multiple="true">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>