<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataRekomendasiLaptopRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataLaptoRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $datarekomen;
    public function __construct(DataRekomendasiLaptopRepositories $datarekomen)
    {
        $this->datarekomen = $datarekomen;
    }

    public function getRekomen()
    {
        $getdata =$this->datarekomen->listDataWeb();
        return view('Web.DataRekomendasi.index',compact('getdata'));
    }

}
