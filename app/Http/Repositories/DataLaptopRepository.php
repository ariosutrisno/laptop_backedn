<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DataLaptopRepository
{
    public function createDataLaptop($request)
    {
        
        $image = $this->upload($request);
        $create_datalaptop = DB::table('data_laptop')
        ->insert([
            
            'merek_laptop'=>$request->merek,
            'tipe'=>$request->tipe,
            'ram'=>$request->ram,
            'processor'=>$request->processor,
            'display'=>$request->display,
            'vga_card'=> $request->vga,
            'storage'=>$request->storage,
            'harga'=>$request->harga,
            'gambar'=>$image,
        ]);
        return $create_datalaptop;
    }

    public function listdatalaptop()
    {
        $data = DB::table('data_laptop')->get();
        return $data;
    }

    public function viewData($idx_datalaptop){
        $dataLaptop = DB::table('data_laptop')->where('idx_datalaptop','=', $idx_datalaptop)->first();
        return $dataLaptop;
    }

    // public function nomorLaptop()
    // {
        
    //     $Awal = 'LPT'; 
    //     $noUrutAkhir = DB::table('data_laptop')->count('nomor_laptop');
    //     $nomor_laptop = sprintf("%03s", abs($noUrutAkhir + 1)). '-'. $Awal;
    //         if($noUrutAkhir) {
    //             $nomor_laptop;
    //         }
    //     return $nomor_laptop;
    // }

    public function deleteData($idx_datalaptop){
        $delete = DB::table('data_laptop')->where('idx_datalaptop','=',$idx_datalaptop)->delete();
        return $delete;
    }

    public function update($request, $idx_datalaptop){
        $image = $this->upload($request);
        $dataUpdate = DB::table('data_laptop')->where('idx_datalaptop','=',$idx_datalaptop)->update([
            'merek_laptop'=>$request->merek,
            'tipe'=>$request->tipe,
            'ram'=>$request->ram,
            'processor'=>$request->processor,
            'display'=>$request->display,
            'vga_card'=> $request->vga,
            'storage'=>$request->storage,
            'harga'=>$request->harga,
            'gambar'=>$image,
        ]);
        return $dataUpdate;
    }
    
    public function editData($idx_datalaptop){
        $data = DB::table('data_laptop')->where('idx_datalaptop','=',$idx_datalaptop)->first();
        return $data;
    }

    function upload($request)
    {
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        Storage::putFileAs('public/images', $file,$name);
        $files = 'storage/images/' . $name;
        return $files;
    }  
}