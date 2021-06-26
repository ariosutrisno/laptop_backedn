<?php

namespace App\Http\Controllers\Web\SubKriteria;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SUBKRITERIA\VgaRepositories;
use Illuminate\Http\Request;

class VgaCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Vga;

    public function __construct(VgaRepositories $Vga)
    {
        $this->Vga = $Vga;
    }
    public function get()
    {
        $data = $this->Vga->ambildata();
        return view('Web.SubKriteria.Vga.index',compact('data'));
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
        $this->Vga->buatdata($request);
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
    public function edit($idx_vga)
    {
        $data = $this->Vga->viewdata($idx_vga);
        return view('Web.SubKriteria.Vga.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_vga)
    {
        $this->Vga->updatedata($request,$idx_vga);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idx_vga)
    {
        $this->Vga->deletedata($idx_vga);
        return redirect()->back();
    }
}
