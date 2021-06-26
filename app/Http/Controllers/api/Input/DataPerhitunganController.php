<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataPerhitunganRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
class DataPerhitunganController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $datahitung;

    public function __construct(DataPerhitunganRepository  $datahitung)
    {
        $this->datahitung = $datahitung;
    }
    public function utility()
    {
        $utility = $this->datahitung->datautility();
        if (collect($utility)->count()) {
            return $this->sendResponse(0, 19, $utility);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function perhitungan()
    {
        $data_hitung = $this->datahitung->hasilperhitungan();
        if (collect($data_hitung)->count()) {
            return $this->sendResponse(0, 19, $data_hitung);
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
