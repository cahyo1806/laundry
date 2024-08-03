<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/member', \App\Http\Controllers\MemberController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/pembelianbarang', \App\Http\Controllers\PembelianBarangController::class);
Route::resource('/datalaundrymember', \App\Http\Controllers\DataLaundryMemberController::class);
Route::resource('/datalaundrynonmember', \App\Http\Controllers\DataLaundryNonMemberController::class);
Route::resource('/login', \App\Http\Controllers\LoginController::class);