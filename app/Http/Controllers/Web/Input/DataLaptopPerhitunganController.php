<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataPerhitunganRepository;
use Illuminate\Http\Request;

class DataLaptopPerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $perhitungan;
    public function __construct(DataPerhitunganRepository $perhitungan)
    {
        $this->perhitungan = $perhitungan;
    }
    public function index()
    {
        $data_tampil = $this->perhitungan->hasilperhitungan();
        $data_ranking = $this->perhitungan->rangking_web();
        return view('Web.DataPerhitungan.ranking',compact('data_ranking'));
    }
    public function getUtility()
    {
        $data_tampil =$this->perhitungan->datautility();
        return view('Web.DataNilaiUtility.index',compact('data_tampil'));
    }
    public function perhitungan()
    {
        
        $data_tampil = $this->perhitungan->hasilperhitungan();
        // dd($data_tampil->rank);
        $data_normalisasi = $this->perhitungan->data_normalisasi();
        // $ranking = $this->perhitungan->rangking();
        return view('Web.DataPerhitungan.index',compact('data_tampil'));
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
    public function posthitung(Request $request)
    {
        $this->perhitungan->posthitung($request);
        return redirect()->back();
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
