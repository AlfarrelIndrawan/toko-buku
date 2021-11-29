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


Route::get('/login', function () {
    return view('login');
});

Route::post('/login/proses', 'LoginController@login')->name('proses_login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', function () {
    return view('regis');
});

Route::post('/register/proses', 'LoginController@registrasi')->name('proses_register');

Route::post('/keranjang/proses', 'HomeController@masuk_keranjang')->name('masuk_keranjang');
Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/bayar', function () {
    return view('bayar');
});

Route::get('/profil', function () {
    return view('profil');
});