<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Echo_;

class DataLaptopNormalisasiRepositories
{
    function data_normalisasi_mobile(){
        $data_normalisasi = new DataLaptopNormalisasiRepositories();
        $data_normalisasi->total_data_kriteria = $total_kriteria = DB::table('data_kriteria')->sum('bobot');
        $data_normalisasi->data_kriteria = DB::table('data_kriteria')->get();
        $data_normalisasi->data_kriteria_get = $data_kriteria_get =  DB::table('data_kriteria')->get();
        for ($i=0; $i < count($data_kriteria_get); $i++) { 
            # code...
            $data_kriteria_get[$i] = $data_kriteria_get[$i]->bobot / $total_kriteria;
        }
        return $data_normalisasi;
    }   
    
}