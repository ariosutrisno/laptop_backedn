<?php

namespace App\Http\Controllers\Web\Input;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DataAlternatifRepositories;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class DataLaptopAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dataalternatif;
    public function __construct(DataAlternatifRepositories $dataalternatif)
    {
        $this->dataalternatif = $dataalternatif;
    }

    public function getAlternatif()
    {
        $ram = $this->dataalternatif->ram();
        $display = $this->dataalternatif->display();
        $harga = $this->dataalternatif->harga();
        $storage = $this->dataalternatif->storage();
        $vga = $this->dataalternatif->vga();
        $procesor = $this->dataalternatif->procesor();
        $data_laptop = $this->dataalternatif->datalaptop();
        $data = $this->dataalternatif->listData();
        $array = $this->dataalternatif->array();
        return view('Web.DataAlternatif.index',compact('data','display','ram','storage','vga','procesor','harga','data_laptop','array'));
    }

    
    public function PostDataAlternatif(Request $request)
    {
        $this->dataalternatif->createdata($request);
        return redirect()->back();
    }

    public function EditDataAlternatif($idx_alternatif)
    {
        $dataAlternatif = $this->dataalternatif->dataView($idx_alternatif);
        return view('Web.DataAlternatif.edit',compact('dataAlternatif'));
    }

    public function updateDataAlternatif(Request $request, $idx_alternatif)
    {
        $this->dataalternatif->updateData($request,$idx_alternatif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDataAlternatif($idx_alternatif)
    {
        $this->dataalternatif->DeleteData($idx_alternatif);
        return redirect()->back();
    }
}
