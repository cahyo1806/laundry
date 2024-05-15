<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('/pegawai', \App\Http\Controllers\PegawaiController::class);
Route::resource('/member', \App\Http\Controllers\MemberController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);