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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('peran', 'PeranController');
Route::resource('kategori', 'KategoriController');
Route::resource('tipekegiatan', 'TipeKegiatanController');
Route::resource('tipeberkas', 'TipeBerkasController');
Route::resource('departemen', 'DepartemenController');
Route::resource('fakultas', 'FakultasController');
Route::get('penelitipsb/indeks/{id}', ['as' => 'penelitipsb.indeks', 'uses' => 'PenelitiPSBController@indeks']);
Route::get('penelitipsb/generatePDF/{id}','PenelitiPSBController@generatePDF');
Route::resource('penelitipsb', 'PenelitiPSBController');
Route::get('penelitinonpsb/indeks/{id}', ['as' => 'penelitinonpsb.indeks', 'uses' => 'PenelitiNonPSBController@indeks']);
Route::resource('penelitinonpsb', 'PenelitiNonPSBController');
Route::resource('berita', 'BeritaController');
Route::get('/berita/downloadFile/{id}', 'BeritaController@downloadFile');
Route::resource('berkas', 'BerkasController');
Route::get('/berkas/downloadFile/{id}', 'BerkasController@downloadFile');
Route::resource('publikasijurnal', 'PublikasiJurnalController');
Route::get('/publikasijurnal/downloadFile/{id}', 'PublikasiJurnalController@downloadFile');
Route::resource('publikasibuku', 'PublikasiBukuController');
Route::get('kegiatan/index/{id}', ['as' => 'kegiatan.index', 'uses' => 'KegiatanController@index']);
Route::get('kegiatan/create/{id}', ['as' => 'kegiatan.create', 'uses' => 'KegiatanController@create']);
Route::resource('kegiatan', 'KegiatanController', ['except' => ['index', 'create']]);
Route::resource('unduh', 'UnduhController');
Route::get('/unduh/generatePDF/{id}', 'UnduhController@generatePDF');