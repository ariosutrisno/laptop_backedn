<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class DataRekomendasiLaptopRepositories
{
    public function listData()
    {
        $id_user = Auth::id();
        $data = DB::table('data_rekomendasi')->where('id_user','=',$id_user)->get();
        return $data;
    }
    public function createdata($request)
    {
        $id_user = Auth::id();
        DB::table('data_rekomendasi')->where('id_user','=',$id_user)->insert([
            'id_user'=>$id_user,
            'merek_laptop' => $request->merk,
            'type_laptop' => $request->tipe,
            'harga_laptop' => $request->harga,
        ]);
        
    }
    public function dataView($idx_rekomendasi)
    {
        $id_user = Auth::id();
        $data = DB::table('data_rekomendasi')->where('id_user','=',$id_user)->where('idx_rekomendasi','=',$idx_rekomendasi)->first();
        return $data;
    }
    public function DeleteData($idx_rekomen)
    {
        $id_user = Auth::id();
        $data = DB::table('data_rekomendasi')->where('id_user','=',$id_user)->where('idx_rekomendasi','=',$idx_rekomen)->delete();
        return $data;
    }
    public function updateData($request,$idx_rekomendasi)
    {
        $id_user = Auth::id();
        DB::table('data_rekomendasi')->where('id_user','=',$id_user)->where('idx_rekomendasi','=',$idx_rekomendasi)->update([
            'merek_laptop' => $request->merk,
            'type_laptop' => $request->tipe,
            'harga_laptop' => $request->harga,
        ]);
    }


}