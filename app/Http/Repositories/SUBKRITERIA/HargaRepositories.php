<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;


class HargaRepositories
{
    public function ambildata(){
        $dataRam = DB::table('tbl_harga')->get();
        return $dataRam;
    }
    public function buatdata($request){
        DB::table('tbl_harga')->insert([
            'nilai_harga'=>$request->nilai_hasil,
            'harga'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_harga){
        DB::table('tbl_harga')->where('idx_harga','=',$idx_harga)->update([
            'nilai_harga'=>$request->nilai_hasil,
            'harga'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_harga){
        $dataRam = DB::table('tbl_harga')->where('idx_harga','=',$idx_harga)->first();
        return $dataRam;
    }
    public function deletedata($idx_harga){
        $dataRam = DB::table('tbl_harga')->where('idx_harga','=',$idx_harga)->delete();
        return $dataRam;
    }

}