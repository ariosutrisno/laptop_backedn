<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataPerhitunganRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
class DataRankingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dataranking;

    public function __construct(DataPerhitunganRepository  $dataranking)
    {
        $this->dataranking = $dataranking;
    }

    public function getAllData()
    {
        $check_ranking = $this->dataranking->rangking();
        if (collect($check_ranking)->count()) {
            return $this->sendResponse(0, 19, $check_ranking);
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
