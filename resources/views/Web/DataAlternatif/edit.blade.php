
<input type="hidden" value="{{ $dataAlternatif->alternatif->idx_alternatif }}" name="idx_alternatif" id="alternatif">
<div class="form-group">
    <label for="exampleFormControlInput1">Merk Laptop</label>
    <select class="form-control"   name="datalaptop"  id="exampleFormControlInput1">
        @foreach ($dataAlternatif->datalaptop() as $item)
            <option value="{{ $item->idx_datalaptop }}" {{ $item->idx_datalaptop == $dataAlternatif->alternatif->idx_alternatif ? 'selected' : '' }}>{{ $item->merek_laptop }}</option>
        @endforeach
        
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">RAM</label>
    <select class="form-control" name="c1"  id="exampleFormControlInput1">
        @foreach ($dataAlternatif->ram() as $item)
            <option  value="{{ $item->idx_ram }}" {{ $item->idx_ram == $dataAlternatif->alternatif->idx_ram ? 'selected' : '' }}>{{ $item->nama_ram }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">PROCESSOR</label>
    <select class="form-control" name="c2" id="exampleFormControlInput1">
        @foreach ($dataAlternatif->procesor() as $item)
            <option  value="{{ $item->idx_processor }}" {{ $item->idx_processor == $dataAlternatif->alternatif->idx_processor ? 'selected' : '' }}>{{ $item->nama_processor }}</option>
        @endforeach
        
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">DISPLAY</label>
    <select class="form-control" name="c3"  id="exampleFormControlInput1">
        @foreach ($dataAlternatif->display() as $item)
            <option  value="{{ $item->idx_display }}" {{ $item->idx_display == $dataAlternatif->alternatif->idx_display ? 'selected' : '' }}>{{ $item->nama_display }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">STORAGE</label>
    <select class="form-control" name="c4" id="exampleFormControlInput1">
        @foreach ($dataAlternatif->storage() as $item)
            <option  value="{{ $item->idx_storage }}" {{ $item->idx_storage == $dataAlternatif->alternatif->idx_storage ? 'selected' : '' }}>{{ $item->nama_storage }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">VGA CARD</label>
    <select class="form-control" name="c5" id="exampleFormControlInput1">
        @foreach ($dataAlternatif->vga() as $item)
            <option  value="{{ $item->idx_vga }}" {{ $item->idx_vga == $dataAlternatif->alternatif->idx_vga_card ? 'selected' : '' }}>{{ $item->nama_vgacard }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">HARGA</label>
    <select class="form-control" name="c6"  id="exampleFormControlInput1">
        @foreach ($dataAlternatif->harga() as $item)
            <option  value="{{ $item->idx_harga }}" {{ $item->idx_harga == $dataAlternatif->alternatif->idx_harga ? 'selected' : '' }}>{{ $item->nama_harga }}</option>
        @endforeach
    </select>
</div>

