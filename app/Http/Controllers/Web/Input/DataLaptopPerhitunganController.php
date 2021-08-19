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
        $data_ranking = $this->perhitungan->ranking_web();
        return view('Web.DataPerhitungan.ranking',compact('data_ranking'));
    }
    
    public function perhitungan()
    {
        // $hasil_akhir = $this->perhitungan->hasilperhitungan();
        return view('Web.DataPerhitungan.index');
    }
    
    public function posthitung(Request $request)
    {
        $this->perhitungan->posthitung($request);
        return redirect()->back();
    }

}
