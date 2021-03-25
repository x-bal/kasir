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
})->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Route Profile
    Route::get('/profile', 'DashboardController@profile')->name('profile');

    // Route Update Profile
    Route::patch('/updateProfile/{user:id}', 'DashboardController@updateProfile')->name('update.profile');

    // Route Member
    Route::get('/member/get/{member:id}', 'MemberController@get')->name('member.get');
    Route::resource('member', 'MemberController');

    // Route Transaksi
    Route::get('/transaksi/{transaksi:id}/print', 'TransaksiController@print')->name('transaksi.print');
    Route::get('/transaksi/{transaksi:id}/struk', 'TransaksiController@struk')->name('transaksi.struk');
    Route::get('/transaksi/generate/{total}', 'TransaksiController@generate')->name('transaksi.generate');
    Route::post('/transaksi/add', 'TransaksiController@add')->name('transaksi.add');
    Route::get('laporan/transaksi', 'TransaksiController@laporan')->name('laporan.transaksi');
    Route::post('transaksi/generate', 'TransaksiController@generate')->name('transaksi.generate');

    Route::resource('transaksi', 'TransaksiController');

    Route::resource('order', 'OrderController');
    Route::post('/order/insert', 'OrderController@insert');

    Route::middleware('admin')->group(function () {
        // Route Users
        Route::get('users/generate', 'UserController@generate')->name('users.generate');
        Route::resource('users', 'UserController');

        // Route Member
        Route::get('member/history/{member:id}', 'MemberController@history')->name('member.history');

        // Route Barang
        Route::get('laporan/barang', 'BarangController@laporan')->name('laporan.barang');
        Route::post('barang/generate', 'BarangController@generate')->name('barang.generate');
        Route::post('barang/eskport', 'BarangController@export')->name('barang.eksport');
        Route::get('/barang/print-code', 'BarangController@printCode')->name('barang.printCode');
        Route::get('/barang/print/{barang:id}', 'BarangController@print')->name('barang.print');
        Route::resource('barang', 'BarangController');

        // Route Distributor
        Route::resource('distributor', 'DistributorController');

        // Route Stok
        Route::resource('stok', 'StokController');

        // Route Transaksi
        Route::patch('order/updateTransaksi/{transaksi:id}', 'OrderController@updateTransaksi')->name('order.updateTransaksi');
    });
});
