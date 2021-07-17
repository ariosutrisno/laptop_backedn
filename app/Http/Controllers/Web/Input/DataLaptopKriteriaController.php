<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataKriteriaRepositories;
use App\Http\Repositories\DataLaptopRepository;
use Illuminate\Http\Request;

class DataLaptopKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $datakriteria;
    public function __construct(DataKriteriaRepositories $datakriteria)
    {
        $this->datakriteria = $datakriteria;
    }

    public function getKriteria()
    {
        $idx_kriteria = $this->datakriteria->id_kriteria();
        $data = $this->datakriteria->listdata();
        $count_kriteria = $this->datakriteria->count_kriteria();
        return view('Web.DataKriteria.index',compact('idx_kriteria','data','count_kriteria'));
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
        $this->datakriteria->createdata($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idx_kriteria)
    {
        $data = $this->datakriteria->viewdata($idx_kriteria);
        return view('Web.DataKriteria.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editData($idx_kriteria)
    {
        $data = $this->datakriteria->viewdata($idx_kriteria);
        return view('Web.DataKriteria.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $idx_kriteria)
    {
        $this->datakriteria->updatedata($request,$idx_kriteria);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($idx_kriteria)
    {
        $this->datakriteria->deletedata($idx_kriteria);
        return redirect()->back();
    }
}
