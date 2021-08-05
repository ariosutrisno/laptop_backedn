<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'api\auth\AuthController@login');
Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    //USER
    Route::post('logout', 'api\auth\AuthController@logout')->name('user.logout');
    /* PROFILE */
    Route::get('profile', 'api\auth\ProfileController@details');
    //Auth token
    Route::post('auth/token', 'api\auth\AuthController@tokencek');
    /* 
    *
    *DATA REKOMENDASI LAPTOP
    */
    Route::get('dataRekomen', 'api\Input\DataRekomenController@getAll');
    Route::post('dataRekomen', 'api\Input\DataRekomenController@saveRekomen');
    Route::get('dataRekomen/{idx_rekomen}/edit', 'api\Input\DataRekomenController@editRekomen');
    Route::post('dataRekomen/{idx_rekomen}/update', 'api\Input\DataRekomenController@updateRekomen');
    Route::get('dataRekomen/{idx_rekomen}/delete', 'api\Input\DataRekomenController@deleteRekomen');
    /* 
    *DATA LAPTOP
    *
    */
    Route::get('datalaptop', 'api\Input\DataLaptopController@getAll');
    Route::get('datalaptop/{idx_datalaptop}/view', 'api\Input\DataLaptopController@viewdata');

    //Data Kriteria && Normalisasi
    Route::get('datakriteria', 'api\Input\DataKriteriaController@getAll');
    Route::get('datanormalisasi', 'api\Input\DataKriteriaController@normalisasi');

    // Data Alternatif
    Route::get('alternatif','api\Input\DataAlternatifController@getData');
    Route::get('utility', 'api\Input\DataAlternatifController@utility');
    Route::get('ranking/all', 'api\Input\DataRankingController@allRank');
    Route::get('ranking', 'api\Input\DataRankingController@getAllData');
    
    /* ROUTE FILTER DATA */
    Route::get('filter', 'api\Input\DataRankingController@datafilter');

});
Route::post('register', 'api\Register\RegisterController@registerAsUser');