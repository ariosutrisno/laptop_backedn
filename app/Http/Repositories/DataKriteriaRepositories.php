<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class DataKriteriaRepositories
{
    public function listdata(){

        
        $dataKriteria = DB::table('data_kriteria')->get();
        return $dataKriteria;
        
    }
    public function createdata($request){
        
        // $kriteria = $this->id_kriteria();
        DB::table('data_kriteria')->insert([
            'kriteria_id'=>$request->kriteria_id,
            'nama_kriteria'=> $request->nama_kriteria,
            'bobot'=> $request->bobot,
            'deskripsi'=>$request->deskripsi,
        ]);
        
    }
    public function viewdata($idx_kriteria){
        $datashow = DB::table('data_kriteria')->where('idx_kriteria','=',$idx_kriteria)->first();
        return $datashow;

    }
    public function updatedata($request,$idx_kriteria){
        $dataupdate = DB::table('data_kriteria')->where('idx_kriteria','=',$idx_kriteria)->update([
            'kriteria_id'=>$request->kriteria_id,
            'nama_kriteria'=> $request->nama_kriteria,
            'bobot'=> $request->bobot,
            'deskripsi'=>$request->deskripsi,
        ]);
        return $dataupdate;
    }
    public function deletedata($idx_kriteria){
        $datadelete = DB::table('data_kriteria')->where('idx_kriteria','=',$idx_kriteria)->delete();
        return $datadelete;
    }
    // kode id kriteria 
    function id_kriteria(){
        $name = 'Kriteria';
        $noUrut = DB::table('data_kriteria')->count('kriteria_id');
        $data_urut = sprintf("%03s",abs($noUrut + 1)). '-' . $name;
        if ($noUrut) {
            # code...
            $data_urut;
        }
        return $data_urut;
    }
    
}