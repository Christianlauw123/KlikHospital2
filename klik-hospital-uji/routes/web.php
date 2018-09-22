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
Route::resource('/klik-room','KlikRoomController');
Route::get('/klik-room/detail_rs/{id}','KlikRoomController@detailRumahSakit');
Route::resource('/klik-doctor','KlikDoctorController');
Route::get('/klik-doctor/detail_doctor/{id}','KlikDoctorController@detailDoctor');

