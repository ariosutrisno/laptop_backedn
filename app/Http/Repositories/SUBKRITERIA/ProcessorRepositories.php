<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;


Class ProcessorRepositories
{
    public function ambildata(){
        $dataRam = DB::table('tbl_processor')->get();
        return $dataRam;
    }
    public function buatdata($request){
        DB::table('tbl_processor')->insert([
            'nilai_processor'=>$request->nilai_hasil,
            'processor'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_processor){
        DB::table('tbl_processor')->where('idx_processor','=',$idx_processor)->update([
            'nilai_processor'=>$request->nilai_hasil,
            'processor'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_processor){
        $dataRam = DB::table('tbl_processor')->where('idx_processor','=',$idx_processor)->first();
        return $dataRam;
    }
    public function deletedata($idx_processor){
        $dataRam = DB::table('tbl_processor')->where('idx_processor','=',$idx_processor)->delete();
        return $dataRam;
    }

}
