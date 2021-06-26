<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataLaptopNormalisasiRepositories;
use Illuminate\Http\Request;

class DataLaptopNormalisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $normalisasi;
    public function __construct(DataLaptopNormalisasiRepositories $normalisasi)
    {
        $this->normalisasi = $normalisasi;
    }
    public function getNormalisasi()
    {
        $data_tampil = $this->normalisasi->listdata();
        $data_normalisasi = $this->normalisasi->data_normalisasi();
        return view('Web.DataNormalisasi.index',compact('data_tampil','data_normalisasi'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idx_normalisasi)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idx_normalisasi)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_normalisasi)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idx_normalisasi)
    {
      
    }
}
