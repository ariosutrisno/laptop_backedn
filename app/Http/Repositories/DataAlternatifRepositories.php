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
    function array()
    {
        $name = 'A';
        $noUrut = DB::table('data_alternatif')->count('alternatif');
        $combine = sprintf($name.abs($noUrut + 1));
        return $combine;
    }
    public function listData()
    {

        $data = DB::table('data_alternatif')->get();
        return $data;
    }
    public function createdata($request)
    {
        $array = $this->array();
        // dd($request->input('idx_datalaptop'));
        DB::table('data_alternatif')->insert([
            'alternatif'=>$array,
            'datalaptop'=>$request->input('datalaptop'),
            'c1'=>$request->input('c1'),
            'c2'=>$request->input('c2'),
            'c3'=>$request->input('c3'),
            'c4'=>$request->input('c4'),
            'c5'=>$request->input('c5'),
            'c6'=>$request->input('c6'),
            
        ]);
    }
    public function dataView($idx_alternatif)
    {
        $data = DB::table('data_alternatif')->where('idx_alternatif','=',$idx_alternatif)->first();
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
    /* 
    * HITUNG NILAI UTILITY
    *
    */
    public function nilaiutility()
    {
        $data = new DataAlternatifRepositories();
        $data->alternatif = $alternatif= DB::table('data_alternatif')->get();
        $data->min1 = $alternatif->min('c1');
        $data->max1 = $alternatif->max('c1');
        $data->min2 = $alternatif->min('c2');
        $data->max2 = $alternatif->max('c2');
        $data->min3 = $alternatif->min('c3');
        $data->max3 = $alternatif->max('c3');
        $data->min4 = $alternatif->min('c4');
        $data->max4 = $alternatif->max('c4');
        $data->min5 = $alternatif->min('c5');
        $data->max5 = $alternatif->max('c5');
        $data->min6 = $alternatif->min('c6');
        $data->max6 = $alternatif->max('c6');
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