
<input type="hidden" value="{{ $data->id->idx_alternatif }}" id="alternatif">
<div class="form-group">
    <label for="exampleFormControlInput1">Merk Laptop</label>
    <select class="form-control"   name="datalaptop"  id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option value="{{ $item->idx_datalaptop }}">{{ $item->merek_laptop }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">RAM</label>
    <select class="form-control" name="c1"  id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option  value="{{ $item->idx_ram }}">{{ $item->ram }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">PROCESSOR</label>
    <select class="form-control" name="c2" id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option value="{{ $item->idx_processor }}" >{{ $item->processor }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">DISPLAY</label>
    <select class="form-control" name="c3"  id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option  value="{{ $item->idx_display}}">{{ $item->display }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">STORAGE</label>
    <select class="form-control" name="c4" id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option  value="{{ $item->idx_storage }}">{{ $item->storage }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">VGA CARD</label>
    <select class="form-control" name="c5" id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option  value="{{ $item->idx_vga }}">{{ $item->vgacard }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">HARGA</label>
    <select class="form-control" name="c6"  id="exampleFormControlInput1">
        @foreach ($data as $item)
            <option  value="{{ $item->idx_harga }}">{{ $item->harga }}</option>
        @endforeach
    </select>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>