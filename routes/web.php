<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('home', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('home');

// About route
Route::get('/about', function () {
    return view('about', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('about');

// services route
Route::get('/services', function () {
    return view('services', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('services');

// profile route
Route::get('/profile', function () {
    return view('profile', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('profile');

//login route
Route::get('/login', function () {
    return view('login', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('login');

// eskul route
Route::get('/eskul', function () {
    return view('eskul', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('eskul');

// settigs route
Route::get('/settings', function () {
    return view('settings', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ]
    ]);
})->name('settings');
