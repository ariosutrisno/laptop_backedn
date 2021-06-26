<?php

namespace App\Http\Controllers\Web\SubKriteria;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SUBKRITERIA\DisplayRepositories as DisplayRepo;
use Illuminate\Http\Request;


class DisplayController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Display;

    public function __construct(DisplayRepo $Display)
    {
        $this->Display = $Display;
    }

    public function get()
    {
        $data = $this->Display->ambildatadisplay();
        return view('Web.SubKriteria.Display.index',compact('data'));
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
        $this->Display->buatdata($request);
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
    public function edit($idx_display)
    {
        $data = $this->Display->viewdata($idx_display);
        return view('Web.SubKriteria.Display.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_display)
    {
        $this->Display->updatedata($request,$idx_display);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idx_display)
    {
        $this->Display->deletedata($idx_display);
        return redirect()->back();
    }
}
