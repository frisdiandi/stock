<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


//Authentication
Auth::routes();
Route::get('/home', 'Admin\HomeController@index');
Route::get('/admin/home', 'Admin\HomeController@index');
Route::get('/admin/change', 'Admin\HomeController@change');
Route::post('/admin/change_password', 'Admin\HomeController@change_password');

//Satuan
Route::get('/admin/satuan', 'Admin\SatuanController@read');
Route::get('/admin/satuan/add', 'Admin\SatuanController@add');
Route::post('/admin/satuan/create', 'Admin\SatuanController@create');
Route::get('/admin/satuan/edit/{id}', 'Admin\SatuanController@edit');
Route::post('/admin/satuan/update/{id}', 'Admin\SatuanController@update');
Route::get('/admin/satuan/delete/{id}', 'Admin\SatuanController@delete');


//jenis_barang
Route::get('/admin/jenis_barang', 'Admin\JenisController@read');
Route::get('/admin/jenis_barang/add', 'Admin\JenisController@add');
Route::post('/admin/jenis_barang/create', 'Admin\JenisController@create');
Route::get('/admin/jenis_barang/edit/{id}', 'Admin\JenisController@edit');
Route::post('/admin/jenis_barang/update/{id}', 'Admin\JenisController@update');
Route::get('/admin/jenis_barang/delete/{id}', 'Admin\JenisController@delete');


//barang
Route::get('/admin/barang', 'Admin\DataController@read');
Route::get('/admin/barang/add', 'Admin\DataController@add');
Route::post('/admin/barang/create', 'Admin\DataController@create');
Route::get('/admin/barang/edit/{id}', 'Admin\DataController@edit');
Route::post('/admin/barang/update/{id}', 'Admin\DataController@update');
Route::get('/admin/barang/delete/{id}', 'Admin\DataController@delete');
