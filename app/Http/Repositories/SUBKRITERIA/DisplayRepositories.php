<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;


Class DisplayRepositories
{
    public function ambildatadisplay(){
        $dataDisplay = DB::table('tbl_display')->get();
        return $dataDisplay;
    }
    public function buatdata($request){
        DB::table('tbl_display')->insert([
            'nilai_hasil'=>$request->nilai_hasil,
            'keterangan'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_display){
        DB::table('tbl_display')->where('idx_display','=',$idx_display)->update([
            'nilai_hasil'=>$request->nilai_hasil,
            'keterangan'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_display){
        $datadisplay = DB::table('tbl_display')->where('idx_display','=',$idx_display)->first();
        return $datadisplay;
    }

    public function deletedata($idx_display){
        $datadisplay = DB::table('tbl_display')->where('idx_display','=',$idx_display)->delete();
        return $datadisplay;
    }

}