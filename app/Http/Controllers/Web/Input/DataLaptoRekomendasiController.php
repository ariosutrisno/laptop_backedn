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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PostData(Request $request)
    {
        
        $this->datarekomen->createdata($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ViewRekomen($idx_rekomen)
    {
        $data = $this->datarekomen->dataView($idx_rekomen);
        return view('Web.DataRekomendasi.show',compact('data','getdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRekomenData($idx_rekomen)
    {
        $data = $this->datarekomen->dataView($idx_rekomen);
        return view('Web.DataRekomendasi.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRekomenUpdate(Request $request, $idx_rekomen)
    {
        $this->datarekomen->updateData($request,$idx_rekomen);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRekomen($idx_rekomen)
    {
        $this->datarekomen->DeleteData($idx_rekomen);
        return redirect()->back();
    }
}
