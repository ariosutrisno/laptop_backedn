<input type="hidden" value="{{ $array }}" id="alternatif">
<div class="form-group">
    <label for="exampleFormControlInput1">Merk Laptop</label>
    <select class="form-control"   name="datalaptop"  id="exampleFormControlInput1">
        <option>merk laptop</option>
        @foreach ($data_laptop as $item)
            <option value="{{ $item->idx_datalaptop }}">{{ $item->merek_laptop }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C1</label>
    <select class="form-control" name="c1"  id="exampleFormControlInput1">
        <option>C1 (RAM)</option>
        @foreach ($ram as $item)
            <option  value="{{ $item->idx_ram }}">{{ $item->nama_ram }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C2</label>
    <select class="form-control" name="c2" id="exampleFormControlInput1">
        <option>C2 (PROCESSOR)</option>
        @foreach ($procesor as $item)
            <option value="{{ $item->idx_processor }}" >{{ $item->nama_processor }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C3</label>
    <select class="form-control" name="c3"  id="exampleFormControlInput1">
        <option>C3 (DISPLAY)</option>
        @foreach ($display as $item)
            <option  value="{{ $item->idx_display}}">{{ $item->nama_display }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C4</label>
    <select class="form-control" name="c4" id="exampleFormControlInput1">
        <option>C4 (STORAGE)</option>
        @foreach ($storage as $item)
            <option  value="{{ $item->idx_storage }}">{{ $item->nama_storage }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C5</label>
    <select class="form-control" name="c5" id="exampleFormControlInput1">
        <option>C5 (VGA CARD)</option>
        @foreach ($vga as $item)
            <option  value="{{ $item->idx_vga }}">{{ $item->nama_vgacard }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">C6</label>
    <select class="form-control" name="c6"  id="exampleFormControlInput1">
        <option>C6 (HARGA)</option>
        @foreach ($harga as $item)
            <option  value="{{ $item->idx_harga }}">{{ $item->nama_harga }}</option>
        @endforeach
    </select>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>