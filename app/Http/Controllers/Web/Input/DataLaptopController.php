<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataLaptopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DataLaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $datalaptop;
    public function __construct(DataLaptopRepository $datalaptop)
    {
        $this->datalaptop = $datalaptop;
    }
    public function index()
    {
        
        $dataAll = $this->datalaptop->listdatalaptop();
        return view('Web.DataLaptop.index',compact('dataAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $nomor_laptop = $this->datalaptop->nomorLaptop();
        // return view('Web.DataLaptop.create',compact('nomor_laptop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->datalaptop->createDataLaptop($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($idx_datalaptop)
    {
        $ViewData = $this->datalaptop->viewData($idx_datalaptop);
        return view('Web.DataLaptop.show',compact('ViewData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idx_datalaptop)
    {
        $edit_data = $this->datalaptop->editData($idx_datalaptop);
        return view('Web.DataLaptop.edit',compact('edit_data','idx_datalaptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $idx_datalaptop)
    {
        $this->datalaptop->update($request, $idx_datalaptop);
        return redirect('datalaptop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idx_datalaptop)
    {
        $this->datalaptop->deleteData($idx_datalaptop);
        return redirect()->back();
    }
}
