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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin','auth']], function () {

    Route::get('admin/route','HomeController@admin')->name('admin.dashboard');

    //buku

    Route::get('/admin/buku','BukuController@index');

    Route::post('/admin/buku/tambah','BukuController@store');

    Route::get('/admin/buku/edit/{id}','BukuController@edit');

    Route::put('/admin/buku/update/{id}','BukuController@update');

    Route::post('/buku/import/excel','BukuController@import');

    Route::post('/kategori/import/excel','KategoriController@import');

    Route::get('/admin/buku/hapus/{id}','BukuController@destroy');

    //kategori

    Route::get('/admin/kategori','KategoriController@index');

    Route::post('/admin/kategori/tambah','KategoriController@store');

    Route::get('/admin/kategori/edit/{id}','KategoriController@edit');

    Route::put('/admin/kategori/update/{id}','KategoriController@update');

    Route::get('/admin/kategori/hapus/{id}','KategoriController@destroy');

    //petugas

    Route::get('/admin/petugas','PetugasController@index');

    Route::post('/admin/petugas/tambah','PetugasController@store');

});

Route::group(['middleware' => ['auth']], function () {
   
    Route::get('/petugas/route','PetugasController@dashboard')->name('petugas.dashboard');

    Route::get('/buku','BukuController@home');

    Route::get('/kategori','KategoriController@home');

    Route::get('/buku/pinjam/{id}','PinjamController@create');

    Route::put('/petugas/buku/pinjam','PinjamController@store');

    Route::get('/peminjam','PinjamController@index');

    Route::get('/buku/kembalikan/{id}','PinjamController@kembali');

    Route::put('/buku/kembali/store/{id}','PinjamController@update');

    Route::get('/pengembalian/cetak/{id}','PinjamController@cetak');

    Route::get('/profile/','PetugasController@profile');

});