
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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', 'HomeController@index')->name('index');
require __DIR__.'/auth.php';
Route::get('/keranjang', 'HomeController@keranjang')->middleware('auth')->name('keranjang');
Route::post('/keranjang/proses', 'HomeController@masuk_keranjang')->middleware('auth')->name('masuk_keranjang');
Route::get('/keranjang/hapus/{id}', 'HomeController@hapus_keranjang')->middleware('auth')->name('hapus_keranjang');

Route::get('/bayar', 'HomeController@bayar')->middleware('auth')->name('bayar');
Route::post('/bayar/proses', 'HomeController@proses_bayar')->middleware('auth')->name('proses_bayar');

Route::get('/profil', 'HomeController@profil')->middleware('auth')->name('profil');