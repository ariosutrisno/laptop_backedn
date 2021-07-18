<?php

namespace App\Http\Controllers\api\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\DataKriteriaRepositories;
use App\Http\Repositories\DataLaptopRepository;

class DataKriteriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $data_kriteria;

    public function __construct( DataKriteriaRepositories $data_kriteria)
    {
        $this->data_kriteria = $data_kriteria;
    }
    public function getAll()
    {
        $getKriteria = $this->data_kriteria->listdata();
        if (collect($getKriteria)->count()) {
            return $this->sendResponse(0, 19, $getKriteria);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function normalisasi()
    {
        $normalisasi = $this->data_kriteria->normalisasi();
        if (collect($normalisasi)->count()) {
            return $this->sendResponse(0, 19, $normalisasi);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
}
