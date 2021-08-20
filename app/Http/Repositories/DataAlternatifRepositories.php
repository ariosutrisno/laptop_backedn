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
        // dd($request->input('idx_datalaptop'));
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
        $data = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)
        ->join('tbl_ram','tbl_ram.idx_ram','=','data_alternatif.idx_ram')
        ->join('tbl_processor','tbl_processor.idx_processor','=','data_alternatif.idx_processor')
        ->join('tbl_storage','tbl_storage.idx_storage','=','data_alternatif.idx_storage')
        ->join('tbl_display','tbl_display.idx_display','=','data_alternatif.idx_display')
        ->join('tbl_vgacard','tbl_vgacard.idx_vga','=','data_alternatif.idx_vga_card')
        ->join('tbl_harga','tbl_harga.idx_harga','=','data_alternatif.idx_harga')
        ->join('data_laptop','data_laptop.idx_datalaptop','=','data_alternatif.data_alter')
        ->select('tbl_ram.*','tbl_storage.*','tbl_display.*','tbl_vgacard.*','tbl_harga.*','tbl_processor.*','data_alternatif.*','data_laptop.*')
        ->get();
        $data->id = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->first();
        return $data;
    }
    public function updateData($request,$idx_alternatif)
    {
        $data = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->update([

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