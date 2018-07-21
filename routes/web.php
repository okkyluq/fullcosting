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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'BackController@index');
	Route::resource('bahan', 'BahanBakuController');
	Route::resource('btkl', 'BtklController');
	Route::resource('bop', 'BopController');
	Route::resource('produksi', 'ProduksiController');
	Route::post('getkodeproduksi', 'ProduksiController@getkodeproduksi');
	
	Route::resource('transaksi-bahan', 'TransaksiBahanController');
	Route::post('getbahan', 'TransaksiBahanController@getbahan');
	Route::post('tambahkan-bahan', 'TransaksiBahanController@tambahkan_bahan');
	Route::get('temp-tabel-bahan', 'TransaksiBahanController@temp_tabel_bahan');
	Route::post('hapus-temp-bahan', 'TransaksiBahanController@hapus_temp_bahan');

	Route::resource('transaksi-btkl', 'TransaksiBktlController');
	Route::post('getbtkl', 'TransaksiBktlController@getbtkl');
	Route::post('tambahkan-btkl', 'TransaksiBktlController@tambahkan_btkl');
	Route::get('temp-tabel-btkl', 'TransaksiBktlController@temp_tabel_btkl');
	Route::post('hapus-temp-btkl', 'TransaksiBktlController@hapus_temp_btkl');

	Route::resource('transaksi-bop', 'TransaksiBopController');
	Route::post('getbop', 'TransaksiBopController@getbop');
	Route::post('tambahkan-bop', 'TransaksiBopController@tambahkan_bop');
	Route::get('temp-tabel-bop', 'TransaksiBopController@temp_tabel_bop');
	Route::post('hapus-temp-bop', 'TransaksiBopController@hapus_temp_bop');

	Route::resource('fc', 'FullCostingController');
	Route::post('cek-fc', 'FullCostingController@cek_fc');


});





// Route::get('/home', 'HomeController@index')->name('home');
