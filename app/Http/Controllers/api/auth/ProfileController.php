<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    public function index()
    {
        // $data = DB::table('alternatif')->get();
        // dd($data);
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
    public function store(Request $request)
    {
        //
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
    public function details()
    {
        // echo('saya bisa');
        $result = $this->userRepository->getDetail(Auth::user()->id);
        if (!empty($result)) {
            $result = $this->sendResponse(0, 'Sukses', $result);
        } elseif ($result === false) {
            $result = $this->sendError(2, 4);
        } else {
            $result = $this->sendError(2, 4);
        }

        return $result;
    }
}
