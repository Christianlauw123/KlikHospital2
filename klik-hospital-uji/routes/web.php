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
Route::get('/myTransaction', 'HomeController@myTransaction');

//Section Klik-Room Detail RS dan Kumpulan Kamar
Route::resource('/klik-room','KlikRoomController');

//End Section Klik-Room Detail RS dan Kumpulan Kamar

//Section Klik-Doctor
Route::resource('/klik-doctor','KlikDoctorController');
Route::resource('/doctor','DoctorController');

//Untuk Search doctor berdasar lokasi dan atau spesialis dan atau rumah sakit
Route::get('doctorDetail/{lokasiId?}/{spesialisId?}/{rumahSakitId?}','DoctorController@doctorByParameter');
//EndSection Klik-Doctor

//HospitalController : Untuk ambil data" JQUERY Hospital
Route::get('hospitalData/{lokasiId?}/{tipeRumahSakit?}/{tipeKamar?}','HospitalController@getHospital');
Route::get('hospitalData/{keterangan?}','HospitalController@getHospitalByNama');

//RoomController : Detail Kamar
Route::get('/rooms/{id}','RoomsController@show');
Route::get('/detailRuang/{id}','RoomsController@getDataRuang');

Route::resource('/roomTransaction','RoomTransactionController');
Route::get('/roomTransactionAdmin','RoomTransactionController@getAllTransRoom');

//DataPasien
Route::get('/detailPasien/{id}','PasienController@getDetailPasien');

//Transaksi Klinik Hospital
Route::resource('/hospitalclinicTransaction','HospitalClinicTransactionController');

