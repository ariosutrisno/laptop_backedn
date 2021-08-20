<input type="hidden" value="" id="idx_perangkingan">
<div class="form-group">
    <label for="exampleFormControlInput1">Nama Alternatif</label>
    <select class="form-control" name="alternatif"  id="exampleFormControlInput1">
        @foreach ($alternatif as $item)
            <option  value="{{ $item->idx_alternatif }}">{{ $item->alternatif }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Hasil Ranking</label>
    <select class="form-control" name="ranking"  id="exampleFormControlInput1">
        @foreach ($perhitungan as $datas)
        @php
                $datautility1 = (($datas->nilai_ram - $dataMin1) / ($dataMax1 - $dataMin1));
                $datautility2 = (($datas->nilai_processor - $dataMin2) / ($dataMax2 - $dataMin2));
                $datautility3 = (($datas->nilai_display - $dataMin3) / ($dataMax3 - $dataMin3));
                $datautility4 = (($datas->nilai_storage - $dataMin4) / ($dataMax4 - $dataMin4));
                $datautility5 = (($datas->nilai_vga - $dataMin5) / ($dataMax5 - $dataMin5));
                $datautility6 = (($datas->nilai_harga - $dataMin6) / ($dataMax6 - $dataMin6));

                $hitungkali1 = number_format(($hasil_bobot1*$datautility1),4);
                $hitungkali2 = number_format(($hasil_bobot2*$datautility2),4);
                $hitungkali3 = number_format(($hasil_bobot3*$datautility3),4);
                $hitungkali4 = number_format(($hasil_bobot4*$datautility4),4);
                $hitungkali5 = number_format(($hasil_bobot5*$datautility5),4);
                $hitungkali6 = number_format(($hasil_bobot6*$datautility6),4);
                
                $perhitungan->rank =$arr = (($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 ))
        @endphp
            <option  value="{{ $perhitungan->rank }}">{{ $perhitungan->rank }}</option>
        @endforeach
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success">Save changes</button>
</div>