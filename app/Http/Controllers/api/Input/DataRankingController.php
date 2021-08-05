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

    public function getAllData(Request $request)
    {
        $check_ranking = $this->dataranking->rangking($request);
        if (collect($check_ranking)->count()) {
            return $this->sendResponse(0, 19, $check_ranking);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function datafilter(Request $request)
    {
        $filter = $this->dataranking->mobile_filter($request);
        if (collect($filter)->count()) {
            return $this->sendResponse(0, 19, $filter);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function allRank()
    {
        $filter = $this->dataranking->allrank();
        if (collect($filter)->count()) {
            return $this->sendResponse(0, 19, $filter);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

}
