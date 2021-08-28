<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class DataAlternatifRepositories
{
    /* ID ALTERNATIF */
    function array()
    {
        $name = 'A';
        $noUrut = DB::table('data_alternatif')->count('alternatif');
        $combine = sprintf($name.abs($noUrut + 1));
        return $combine;
    }
    public function listData()
    {
        $data = DB::table('data_alternatif')
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
        ->get();
        return $data;
    }
    public function createdata($request)
    {
        $array = $this->array();
        DB::table('data_alternatif')->insert([
            'alternatif'=>$array,
            'data_alter'=>$request->input('datalaptop'),
            'idx_ram'=>$request->input('c1'),
            'idx_processor'=>$request->input('c2'),
            'idx_display'=>$request->input('c3'),
            'idx_storage'=>$request->input('c4'),
            'idx_vga_card'=>$request->input('c5'),
            'idx_harga'=>$request->input('c6'),
            
        ]);
    }
    public function dataView($idx_alternatif)
    {
        $data = new DataAlternatifRepositories;
        $data->alternatif = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->first();
        $this->datalaptop();
        $this->procesor();
        $this->ram();
        $this->display();
        $this->storage();
        $this->harga();
        $this->vga();
        return $data;
    }
    public function updateData($request,$idx_alternatif)
    {
        
        $data = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->update([
            'data_alter'=>$request->input('datalaptop'),
            'idx_ram'=>$request->input('c1'),
            'idx_processor'=>$request->input('c2'),
            'idx_display'=>$request->input('c3'),
            'idx_storage'=>$request->input('c4'),
            'idx_vga_card'=>$request->input('c5'),
            'idx_harga'=>$request->input('c6'),
        ]);
        return $data;
    }
    public function DeleteData($idx_alternatif)
    {
        $data = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->delete();
        return $data;
    }

    /* =============================== API MOBILE  =================================== */
    /* 
    * HITUNG NILAI UTILITY
    *
    */
    public function utility_nilai()
    {
        $data = new DataAlternatifRepositories();
        $data->alternatif = $alternatif= DB::table('data_alternatif')
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
        ->get();
        $data->min1 = $alternatif->min('nilai_ram');
        $data->max1 = $alternatif->max('nilai_ram');
        $data->min2 = $alternatif->min('nilai_processor');
        $data->max2 = $alternatif->max('nilai_processor');
        $data->min3 = $alternatif->min('nilai_display');
        $data->max3 = $alternatif->max('nilai_display');
        $data->min4 = $alternatif->min('nilai_storage');
        $data->max4 = $alternatif->max('nilai_storage');
        $data->min5 = $alternatif->min('nilai_vga');
        $data->max5 = $alternatif->max('nilai_vga');
        $data->min6 = $alternatif->min('nilai_harga');
        $data->max6 = $alternatif->max('nilai_harga');
        return $data;
    }

    function ranking($request){
        $data = new DataAlternatifRepositories;
        $ram = $request->ram;
        $merek_laptop = $request->merek_laptop;
        $processor = $request->processor;
        $harga = $request->harga;
        $kriteria = DB::table('data_kriteria')->get();
        $sum = DB::table('data_kriteria')->sum('bobot');
        $filter = DB::table('data_alternatif')
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*');
        (!empty($merek_laptop))? $filter->where('data_laptop.merek_laptop', 'LIKE', '%' . $merek_laptop . '%'):'';
        (!empty($ram))? $filter->where('data_alternatif.idx_ram', 'LIKE', '%' . $ram . '%'):'';
        (!empty($processor))? $filter->where('data_alternatif.idx_processor', 'LIKE', '%' . $processor . '%'):'';
        (!empty($harga))? $filter->where('data_alternatif.idx_harga', 'LIKE', '%' . $harga . '%'):'';
        $data->filter = $filter->get();
        
        $alternatif = DB::table('data_alternatif')
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
        ->get();
        $dataMax1 = $alternatif->max('nilai_ram');
        $dataMin1 = $alternatif->min('nilai_ram');
        $dataMax2 = $alternatif->max('nilai_processor');
        $dataMin2 = $alternatif->min('nilai_processor');
        $dataMax3 = $alternatif->max('nilai_display');
        $dataMin3 = $alternatif->min('nilai_display');
        $dataMax4 = $alternatif->max('nilai_storage');
        $dataMin4 = $alternatif->min('nilai_storage');
        $dataMax5 = $alternatif->max('nilai_vga');
        $dataMin5 = $alternatif->min('nilai_vga');
        $dataMax6 = $alternatif->max('nilai_harga');
        $dataMin6 = $alternatif->min('nilai_harga');
        $hasil_bobot1 = $kriteria['0']->bobot / $sum;
        $hasil_bobot2 = $kriteria['1']->bobot / $sum;
        $hasil_bobot3 = $kriteria['2']->bobot / $sum;
        $hasil_bobot4 = $kriteria['3']->bobot / $sum;
        $hasil_bobot5 = $kriteria['4']->bobot / $sum;
        $hasil_bobot6 = $kriteria['5']->bobot / $sum;
        foreach ($alternatif as $alter) {
            $datautility1 = (($alter->nilai_ram - $dataMin1) / ($dataMax1 - $dataMin1));
            $datautility2 = (($alter->nilai_processor - $dataMin2) / ($dataMax2 - $dataMin2));
            $datautility3 = (($alter->nilai_display - $dataMin3) / ($dataMax3 - $dataMin3));
            $datautility4 = (($alter->nilai_storage - $dataMin4) / ($dataMax4 - $dataMin4));
            $datautility5 = (($alter->nilai_vga - $dataMin5) / ($dataMax5 - $dataMin5));
            $datautility6 = (($alter->nilai_harga - $dataMin6) / ($dataMax6 - $dataMin6));
            
            $hitungkali1 = number_format(($hasil_bobot1*$datautility1),4);
            $hitungkali2 = number_format(($hasil_bobot2*$datautility2),4);
            $hitungkali3 = number_format(($hasil_bobot3*$datautility3),4);
            $hitungkali4 = number_format(($hasil_bobot4*$datautility4),4);
            $hitungkali5 = number_format(($hasil_bobot5*$datautility5),4);
            $hitungkali6 = number_format(($hasil_bobot6*$datautility6),4);
            $data->rank[] =  ($hitungkali1 + $hitungkali2 + $hitungkali3 + $hitungkali4 + $hitungkali5 + $hitungkali6 );
        }
        return $data;
    }
// ===================================================== API MOBILE =========================================//

    /* 
    *
    *FUNGSI DATA SUB KRITERIA
    *
    */
    /* 
    * RAM
    */
    function ram()
    {
        $data = DB::table('tbl_ram')->get();
        return $data;
    }
    /* 
    * PROCESSOR
    */
    function procesor()
    {
        $data = DB::table('tbl_processor')->get();
        return $data;
    }
    /* 
    * DISPLAY
    */
    function display()
    {
        $data = DB::table('tbl_display')->get();
        return $data;
    }
    /* 
    * STORAGE
    */
    function storage()
    {
        $data = DB::table('tbl_storage')->get();
        return $data;
    }
    /* 
    * VGA
    */
    function vga()
    {
        $data = DB::table('tbl_vgacard')->get();
        return $data;
    }
    /* 
    * HARGA
    */
    function harga()
    {
        $data = DB::table('tbl_harga')->get();
        return $data;
    }
    /* 
    * DATA LAPTOP
    */
    function datalaptop()
    {
        $data = DB::table('data_laptop')->get();
        return $data;
    }
}