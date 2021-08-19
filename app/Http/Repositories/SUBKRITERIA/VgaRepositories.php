<?php

namespace App\Http\Repositories\SUBKRITERIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class VgaRepositories
{
    public function ambildata(){
        $dataRam = DB::table('tbl_vgacard')->get();
        return $dataRam;
    }
    public function buatdata($request){
        DB::table('tbl_vgacard')->insert([
            'nilai_vga'=>$request->nilai_hasil,
            'vgacard'=>$request->keterangan,
        ]);
    }
    public function updatedata($request,$idx_vga){
        DB::table('tbl_vgacard')->where('idx_vga','=',$idx_vga)->update([
            'nilai_vga'=>$request->nilai_hasil,
            'vgacard'=>$request->keterangan,
        ]);
    }
    public function viewdata($idx_vga){
        $dataRam = DB::table('tbl_vgacard')->where('idx_vga','=',$idx_vga)->first();
        return $dataRam;
    }
    public function deletedata($idx_vga){
        $dataRam = DB::table('tbl_vgacard')->where('idx_vga','=',$idx_vga)->delete();
        return $dataRam;
    }

}