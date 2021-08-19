<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', 'HomeController@index')->name('home');




Route::get('/', 'Web\LandingController@index')->name('home');
Route::get('/access', 'Web\LandingController@access')->name('homeAcces');
Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
     // Dashboard
     Route::get('/dashboard', 'Web\DashboardController@dashboard')->name('dashboard');
     /* 
     *
     *INPUT DATA LAPTOP
     *
     */
     Route::get('/datalaptop', 'Web\Input\DataLaptopController@index')->name('datalaptop');
     Route::post('/datalaptop', 'Web\Input\DataLaptopController@store')->name('DataLaptopPOST');
     Route::get('/datalaptop/{idx_datalaptop}', 'Web\Input\DataLaptopController@view')->name('DataView');
     Route::get('/datalaptop/{idx_datalaptop}/edit', 'Web\Input\DataLaptopController@edit')->name('DataEdit');
     Route::post('/datalaptop/{idx_datalaptop}/Update', 'Web\Input\DataLaptopController@updateData')->name('DataViewUpdated');
     Route::get('/datalaptop/{idx_datalaptop}/delete', 'Web\Input\DataLaptopController@destroy')->name('DataDelete'); 

     /* 
     *
     *INPUT DATA REKOMENDASI
     * 
     */
     Route::get('/datarekomendasi', 'Web\Input\DataLaptoRekomendasiController@getRekomen')->name('datarekomendasi');
     
     /* 
     *
     *INPUT DATA KRITERIA
     * 
     */
     Route::get('/dataKriteria', 'Web\Input\DataLaptopKriteriaController@getKriteria')->name('getKriteria');
     Route::get('/dataKriteria/{idx_kriteria}/edit', 'Web\Input\DataLaptopKriteriaController@editData')->name('editData');
     Route::post('/dataKriteria', 'Web\Input\DataLaptopKriteriaController@PostData')->name('PostDataKritera');
     Route::post('/dataKriteria/{idx_kriteria}/update', 'Web\Input\DataLaptopKriteriaController@updateData')->name('updateData');
     Route::get('/dataKriteria/{idx_kriteria}/delete', 'Web\Input\DataLaptopKriteriaController@deleteData')->name('deleteData');
     
     /* 
     *
     *DATA ALTERNATIF
     * 
     */
     Route::get('/dataAlternatif', 'Web\Input\DataLaptopAlternatifController@getAlternatif')->name('getAlternatif');
     Route::get('/dataAlternatif/{idx_alternatif}/edit', 'Web\Input\DataLaptopAlternatifController@EditDataAlternatif')->name('EditDataAlternatif');
     Route::post('/dataAlternatif', 'Web\Input\DataLaptopAlternatifController@PostDataAlternatif')->name('PostDataAlternatif');
     Route::post('/dataAlternatif/{idx_alternatif}/update', 'Web\Input\DataLaptopAlternatifController@updateDataAlternatif')->name('updateDataAlternatif');
     Route::get('/dataAlternatif/{idx_alternatif}/delete', 'Web\Input\DataLaptopAlternatifController@deleteDataAlternatif')->name('deleteDataAlternatif');

     /* 
     *
     * 
     * DATA  NILAI UTILTY LAPTOP && PERHITUNGAN && HASIL RANGKING
     */
     Route::get('/perhitungan', 'Web\Input\DataLaptopPerhitunganController@perhitungan')->name('perhitungan');
     Route::post('/perhitungan', 'Web\Input\DataLaptopPerhitunganController@posthitung')->name('posthitung');
     Route::get('/ranking', 'Web\Input\DataLaptopPerhitunganController@index')->name('getRangking');
/* ========================================================================================================================================================================== */
                                                       /* SUB KRITERIA */
     /* 
     *
     * 
     *DATA RAM
     *
     */
     Route::get('/ram', 'Web\SubKriteria\RamController@get')->name('dataram');
     Route::post('/ram', 'Web\SubKriteria\RamController@post')->name('postram');
     Route::get('/ram/{idx_ram}/edit', 'Web\SubKriteria\RamController@edit')->name('firstram');
     Route::post('/ram/{idx_ram}/update', 'Web\SubKriteria\RamController@update')->name('upadateram');
     Route::get('/ram/{idx_ram}/delete', 'Web\SubKriteria\RamController@delete')->name('deleteram');
     /* 
     *
     * 
     *DATA PROSESOR
     *
     */
     Route::get('/processor', 'Web\SubKriteria\ProsesorController@get')->name('dataprosesor');
     Route::post('/processor', 'Web\SubKriteria\ProsesorController@post')->name('postprosesor');
     Route::get('/processor/{idx_processor}/edit', 'Web\SubKriteria\ProsesorController@edit')->name('firstprosesor');
     Route::post('/processor/{idx_processor}/update', 'Web\SubKriteria\ProsesorController@update')->name('updateprosesor');
     Route::get('/processor/{idx_processor}/delete', 'Web\SubKriteria\ProsesorController@delete')->name('deleteprosesor');
     /* 
     *
     * 
     *DATA DISPLAY
     *
     */
     Route::get('/display', 'Web\SubKriteria\DisplayController@get')->name('datadisplay');
     Route::post('/display', 'Web\SubKriteria\DisplayController@post')->name('postdisplay');
     Route::get('/display/{idx_display}/edit', 'Web\SubKriteria\DisplayController@edit')->name('firstdisplay');
     Route::post('/display/{idx_display}/update', 'Web\SubKriteria\DisplayController@update')->name('updatedisplay');
     Route::get('/display/{idx_display}/delete', 'Web\SubKriteria\DisplayController@delete')->name('deletedisplay');
     /* 
     *
     * 
     *DATA STORAGE
     *
     */
     Route::get('/store', 'Web\SubKriteria\StorageController@get')->name('datastorage');
     Route::post('/store', 'Web\SubKriteria\StorageController@post')->name('poststorage');
     Route::get('/store/{idx_storage}/edit', 'Web\SubKriteria\StorageController@edit')->name('firststorage');
     Route::post('/store/{idx_storage}/update', 'Web\SubKriteria\StorageController@update')->name('updatestorage');
     Route::get('/store/{idx_storage}/delete', 'Web\SubKriteria\StorageController@delete')->name('deletestorage');
     /* 
     *
     * 
     *DATA VGA CARD
     *
     */
     Route::get('/vga', 'Web\SubKriteria\VgaCardController@get')->name('datavga');
     Route::post('/vga', 'Web\SubKriteria\VgaCardController@post')->name('postavga');
     Route::get('/vga/{idx_vga}/edit', 'Web\SubKriteria\VgaCardController@edit')->name('firstvga');
     Route::post('/vga/{idx_vga}/update', 'Web\SubKriteria\VgaCardController@update')->name('updatevga');
     Route::get('/vga/{idx_vga}/delete', 'Web\SubKriteria\VgaCardController@delete')->name('deletevga');
     /* 
     *
     * 
     *DATA HARGA
     *
     */
     Route::get('/harga', 'Web\SubKriteria\HargaController@get')->name('dataharga');
     Route::post('/harga', 'Web\SubKriteria\HargaController@post')->name('postharga');
     Route::get('/harga/{idx_harga}/edit', 'Web\SubKriteria\HargaController@edit')->name('firstharga');
     Route::post('/harga/{idx_harga}/update', 'Web\SubKriteria\HargaController@update')->name('updateharga');
     Route::get('/harga/{idx_harga}/delete', 'Web\SubKriteria\HargaController@delete')->name('deleteharga');
});