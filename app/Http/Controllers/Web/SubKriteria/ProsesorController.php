<?php

namespace App\Http\Controllers\Web\SubKriteria;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SUBKRITERIA\ProcessorRepositories;
use Illuminate\Http\Request;

class ProsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $processor;

    public function __construct(ProcessorRepositories $processor)
    {
        $this->processor = $processor;
    }
    public function get()
    {
        $data = $this->processor->ambildata();
        return view('Web.SubKriteria.Processor.index',compact('data'));
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
        $this->processor->buatdata($request);
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
    public function edit($idx_processor)
    {
        $data = $this->processor->viewdata($idx_processor);
        return view('Web.SubKriteria.Processor.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_processor)
    {
        $this->processor->updatedata($request,$idx_processor);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idx_processor)
    {
        $this->processor->deletedata($idx_processor);
        return redirect()->back();
    }
}
