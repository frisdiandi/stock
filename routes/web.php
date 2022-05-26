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

//Barang Masuk
Route::get('/admin/barang_masuk', 'Admin\BarangmasukController@read');
Route::get('/admin/barang_masuk/add', 'Admin\BarangmasukController@add');
Route::post('/admin/barang_masuk/create', 'Admin\BarangmasukController@create');
Route::get('/admin/barang_masuk/edit/{id}', 'Admin\BarangmasukController@edit');
Route::post('/admin/barang_masuk/update/{id}', 'Admin\BarangmasukController@update');
Route::get('/admin/barang_masuk/delete/{id}', 'Admin\BarangmasukController@delete');

//Barang Keluar
Route::get('/admin/barang_keluar', 'Admin\BarangkeluarController@read');
Route::get('/admin/barang_keluar/add', 'Admin\BarangkeluarController@add');
Route::post('/admin/barang_keluar/create', 'Admin\BarangkeluarController@create');
Route::get('/admin/barang_keluar/edit/{id}', 'Admin\BarangkeluarController@edit');
Route::post('/admin/barang_keluar/update/{id}', 'Admin\BarangkeluarController@update');
Route::get('/admin/barang_keluar/delete/{id}', 'Admin\BarangkeluarController@delete');

//Jenis Barang
Route::get('/admin/jenis_barang', 'Admin\JenisController@read');
Route::get('/admin/jenis_barang/add', 'Admin\JenisController@add');
Route::post('/admin/jenis_barang/create', 'Admin\JenisController@create');
Route::get('/admin/jenis_barang/edit/{id}', 'Admin\JenisController@edit');
Route::post('/admin/jenis_barang/update/{id}', 'Admin\JenisController@update');
Route::get('/admin/jenis_barang/delete/{id}', 'Admin\JenisController@delete');

//Barang
Route::get('/admin/barang', 'Admin\DataController@read');
Route::get('/admin/barang/add', 'Admin\DataController@add');
Route::post('/admin/barang/create', 'Admin\DataController@create');
Route::get('/admin/barang/edit/{id}', 'Admin\DataController@edit');
Route::post('/admin/barang/update/{id}', 'Admin\DataController@update');
Route::get('/admin/barang/delete/{id}', 'Admin\DataController@delete');
