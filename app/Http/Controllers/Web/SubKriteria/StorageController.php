<?php

namespace App\Http\Controllers\Web\SubKriteria;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SUBKRITERIA\StorageRepositories;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Storage;

    public function __construct(StorageRepositories $Storage)
    {
        $this->Storage = $Storage;
    }
    public function get()
    {
        $data = $this->Storage->ambildata();
        return view('Web.SubKriteria.Storage.index',compact('data'));
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
        $this->Storage->buatdata($request);
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
    public function edit($idx_storage)
    {
        $data = $this->Storage->viewdata($idx_storage);
        return view('Web.SubKriteria.Storage.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idx_storage)
    {
        $this->Storage->updatedata($request,$idx_storage);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idx_storage)
    {
        $this->Storage->deletedata($idx_storage);
        return redirect()->back();
    }
}
