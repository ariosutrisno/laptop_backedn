<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class RamRepositories
{
    public function ambildata(){
        $dataRam = DB::table('tbl_ram')->get();
        return $dataRam;
    }
    public function buatdata($request){
        DB::table('tbl_ram')->insert([
            'nilai_ram'=>$request->nilai_hasil,
            'ram'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_ram){
        DB::table('tbl_ram')->where('idx_ram','=',$idx_ram)->update([
            'nilai_ram'=>$request->nilai_hasil,
            'ram'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_ram){
        $dataRam = DB::table('tbl_ram')->where('idx_ram','=',$idx_ram)->first();
        return $dataRam;
    }
    public function deletedata($idx_ram){
        $dataRam = DB::table('tbl_ram')->where('idx_ram','=',$idx_ram)->get();
        return $dataRam;
    }

}
