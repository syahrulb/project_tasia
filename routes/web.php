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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/index', 'HomeController@index')->name('index');
Route::resource('/setting-perusahaan', 'InfoPerusahaanController');

// laporan
Route::get('/tutupbuku/', 'LaporanController@tutupbuku')->name('tutupbuku');
Route::get('/jurnal/', 'LaporanController@jurnal')->name('jurnal');
Route::get('/tambahjurnal/', 'LaporanController@tambahjurnal')->name('tambahjurnal');
Route::post('/simpanjurnal/', 'LaporanController@simpanjurnal')->name('simpanjurnal');
Route::post('/simpandetailjurnal/', 'LaporanController@simpandetailjurnal')->name('simpandetailjurnal');
Route::get('/detailjurnal/{id}', 'LaporanController@detailjurnal')->name('detailjurnal');


Route::get('/laporan/', 'LaporanController@index')->name('laporan');
Route::get('/create-laporan/', 'LaporanController@generatechart')->name('create-laporan');
Route::get('/pengaturan-rasio/pengaturan/', 'PengaturanRasioController@pengaturan');
Route::get('/pengaturan-akun/pengaturan/', 'PengaturanAkunController@pengaturan');
Route::get('/pengaturan-akun/getAkunHasPengelompokan/{id_kelompok}', 'PengaturanAkunController@getAkunHasPengelompokan');
Route::get('/create-akun/', 'PengaturanAkunController@create');

Route::resource('pengaturan-akun', 'PengaturanAkunController');
Route::resource('pengaturan-diagram', 'PengaturanDiagramController');
Route::resource('pengaturan-rasio', 'PengaturanRasioController');
Route::resource('periode', 'PeriodeController');
Route::post('/storeakun', 'PengaturanAkunController@storeakun');
Route::post('/storerasio', 'PengaturanRasioController@storerasio');
Route::post('/deleteKriteria', 'PengaturanRasioController@deleteKriteria');
Route::post('/deleteAkunPeriode', 'PeriodeController@deleteAkunPeriode');
Route::get('/generateChartRasio', 'LaporanController@generateChartRasio');
Route::get('/generateChartRasio2', 'LaporanController@generateChartRasio2');
Route::post('/generateCharttopdf', 'LaporanController@generateCharttopdf');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
