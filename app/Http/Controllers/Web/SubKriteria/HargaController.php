<?php

namespace App\Http\Controllers\Web\SubKriteria;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SUBKRITERIA\HargaRepositories;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Harga;

    public function __construct(HargaRepositories $Harga)
    {
        $this->Harga = $Harga;
    }
    public function get()
    {
        $data = $this->Harga->ambildata();
        return view('Web.SubKriteria.Harga.index',compact('data'));
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
    public function post(Request $request)
    {
        $this->Harga->buatdata($request);
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
    public function edit($idx_harga)
    {
        $data = $this->Harga->viewdata($idx_harga);
        return view('Web.SubKriteria.Harga.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_harga)
    {
        $this->Harga->updatedata($request,$idx_harga);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idx_harga)
    {
        $this->Harga->deletedata($idx_harga);
        return redirect()->back();
    }
}
