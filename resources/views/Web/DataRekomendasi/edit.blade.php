
    <input type="hidden" value="{{ $data->idx_rekomendasi }}" id="idx_rekomendasi">
    <input type="hidden" value="{{ $data->id_user }}" id="id_data_user">
    <div class="form-group">
        <label for="exampleFormControlInput1">Merk Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Merk Laptop" name="merk" value="{{ $data->merek_laptop }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Tipe Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tipe Laptop" name="tipe" value="{{ $data->type_laptop}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Harga Laptop</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Harga Laptop" name="harga" value="{{ $data->harga_laptop }}">
    </div>
