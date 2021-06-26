<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\DataRekomendasiLaptopRepositories;

class DataRekomenController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rekomendasi;

    public function __construct( DataRekomendasiLaptopRepositories $rekomendasi)
    {
        $this->rekomendasi = $rekomendasi;
    }
    public function getAll()
    {
        $get_rekomendasi = $this->rekomendasi->listData();
        if (collect($get_rekomendasi)->count()) {
            return $this->sendResponse(0, 19,$get_rekomendasi);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveRekomen(Request $request)
    {
        $save_data = $this->rekomendasi->createdata($request);
        if ($save_data) {
            return $this->sendResponse(0, "Berhasil",[]);
        } else { 
            return $this->sendError(2, 'Error');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRekomen($idx_rekomend)
    {
        $edit_data = $this->rekomendasi->dataView($idx_rekomend);
        if ($edit_data) {
            return $this->sendResponse(0, "Berhasil",$edit_data);
        } else { 
            return $this->sendError(2, 'Error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRekomen(Request $request, $idx_rekomend)
    {
        $data_update = $this->rekomendasi->updateData($request,$idx_rekomend);
        if ($data_update) {
            return $this->sendResponse(0, "Berhasil",$data_update);
        } else { 
            return $this->sendError(2, 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRekomen($idx_rekomend)
    {
        $delete_data = $this->rekomendasi->DeleteData($idx_rekomend);
        if ($delete_data) {
            return $this->sendResponse(0, "Berhasil",$delete_data);
        } else { 
            return $this->sendError(2, 'Error');
        }
    }
}
