<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');  

Route::get('/ekstrakurikuler', function () {
    return view('admin/ekstrakurikuler');
})->name('ekstrakurikuler');

Route::get('/siswa', function () {
    return view('admin/siswa');
})->name('siswa');

Route::get('/pembina', function () {
    return view('admin/pembina');
})->name('pembina');

Route::get('/jadwal', function () {
    return view('admin/jadwal');
})->name('jadwal'); 

Route::get('/prestasi', function () {
    return view('admin/prestasi');
})->name('prestasi');

Route::get('/laporan', function () {
    return view('admin/laporan');
})->name('laporan');

Route::get('/formulir', function () {
    return view('admin/formulir');
})->name('formulir');

Route::get('/settings', function () {
    return view('admin/settings');
})->name('settings');

