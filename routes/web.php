<?php

use Illuminate\Support\Facades\{Route, Auth};

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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Route Member
    Route::resource('member', 'MemberController');
    // Route Transaksi
    Route::get('/transaksi/getBarang/{id}', 'TransaksiController@getBarang');
    Route::resource('transaksi', 'TransaksiController');

    Route::middleware('admin')->group(function () {
        // Route Users
        Route::resource('users', 'UserController');
        // Route Barang
        Route::resource('barang', 'BarangController');
        // Route Distributor
        Route::resource('distributor', 'DistributorController');
        // Route Stok
        Route::resource('stok', 'StokController');
    });
});
