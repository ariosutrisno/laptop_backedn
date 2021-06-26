<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Repositories\DataLaptopRepository;
use Illuminate\Http\Request;

class DataLaptopController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $datalaptop;

    public function __construct(DataLaptopRepository $datalaptop)
    {
        $this->datalaptop = $datalaptop;
    }
    public function getAll()
    {
        $getDataAll = $this->datalaptop->listdatalaptop();
        if (collect($getDataAll)->count()) {
            return $this->sendResponse(0, 19, $getDataAll);
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
    public function viewdata($idx_datalaptop)
    {
        $firstData = $this->datalaptop->viewData($idx_datalaptop);
        if (collect($firstData)->count()) {
            return $this->sendResponse(0, 19, $firstData);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idx_datalaptop)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $id)
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
