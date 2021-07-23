<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\DataAlternatifRepositories;

class DataAlternatifController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $alternatif;

    public function __construct( DataAlternatifRepositories $alternatif)
    {
        $this->alternatif = $alternatif;
    }
    public function getData()
    {
        $get_alternatif = $this->alternatif->listData();
        if (collect($get_alternatif)->count()) {
            return $this->sendResponse(0, 19,$get_alternatif);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function utility()
    {
        $utility = $this->alternatif->nilaiutility();
        if (collect($utility)->count()) {
            return $this->sendResponse(0, 19,$utility);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

}
