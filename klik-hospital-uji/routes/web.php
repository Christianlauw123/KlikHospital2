<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Section Klik-Room Detail RS dan Kumpulan Kamar
Route::resource('/klik-room','KlikRoomController');
//End Section Klik-Room Detail RS dan Kumpulan Kamar

Route::resource('/klik-doctor','KlikDoctorController');
Route::resource('/doctor','DoctorController');

//HospitalController : Untuk ambil data" JQUERY Hospital
Route::get('hospitalData/{lokasiId?}/{tipeRumahSakit?},{tipeKamar?}','HospitalController@getHospital');
Route::get('hospitalData/{keterangan?}','HospitalController@getHospitalByNama');

//RoomController : Detail Kamar
Route::get('/rooms/{id}','RoomsController@show');

Route::resource('/roomTransaction','RoomTransactionController@show');

