<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;


class StorageRepositories
{
    public function ambildata(){
        $dataRam = DB::table('tbl_storage')->get();
        return $dataRam;
    }
    public function buatdata($request){
        DB::table('tbl_storage')->insert([
            'nilai_hasil'=>$request->nilai_hasil,
            'keterangan'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_storage){
        DB::table('tbl_storage')->where('idx_storage','=',$idx_storage)->update([
            'nilai_hasil'=>$request->nilai_hasil,
            'keterangan'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_storage){
        $dataRam = DB::table('tbl_storage')->where('idx_storage','=',$idx_storage)->first();
        return $dataRam;
    }
    public function deletedata($idx_storage){
        $dataRam = DB::table('tbl_storage')->where('idx_storage','=',$idx_storage)->delete();
        return $dataRam;
    }

}