<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

//route login
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/home', [AuthController::class, 'home'])->name('home');


// Home route
Route::get('/', function () {
    $user = session('user');
    return view('user/home');
})->name('home');


// About route
Route::get('/about', function () {
    return view('user/about');
})->name('about');

// services route
Route::get('/services', function () {
    return view('user/services');
})->name('services');

// profile route
Route::get('/profile', function () {
    $user = session('users');
    return view('user/profile', [
        'user'=>$user
    ]);
})->name('profile');

//login route
Route::get('/login', function () {
    return view('user/login');
})->name('login');

// eskul route
Route::get('/eskul', function () {
    return view('user/eskul');
})->name('eskul');

// settigs route
Route::get('/settings', function () {
    return view('user/settings');
})->name('settings');

// friends route
Route::get('/friend', function () {
    return view('user/friend', [
        'friends' => [
            [
                'id' => 1,
                'name' => 'Rizky Pratama',
                'nis' => '28692901',
                'class' => 'XII RPL 1',
                'eskul' => 'Programming Club',
                'avatar' => 'avatar1.jpg',
                'status' => 'online',
                'mutual_friends' => 12,
                'joined_date' => '2023-08-15'
            ],
            [
                'id' => 2,
                'name' => 'Sari Indah',
                'nis' => '28692902',
                'class' => 'XII RPL 2',
                'eskul' => 'English Club',
                'avatar' => 'avatar2.jpg',
                'status' => 'offline',
                'mutual_friends' => 8,
                'joined_date' => '2023-08-20'
            ],
            [
                'id' => 3,
                'name' => 'Ahmad Fauzi',
                'nis' => '28692903',
                'class' => 'XII TKJ 1',
                'eskul' => 'Robotics Club',
                'avatar' => 'avatar3.jpg',
                'status' => 'online',
                'mutual_friends' => 15,
                'joined_date' => '2023-08-10'
            ],
            [
                'id' => 4,
                'name' => 'Maya Sari',
                'nis' => '28692904',
                'class' => 'XI RPL 1',
                'eskul' => 'Art Club',
                'avatar' => 'avatar4.jpg',
                'status' => 'away',
                'mutual_friends' => 6,
                'joined_date' => '2023-09-01'
            ],
            [
                'id' => 5,
                'name' => 'Budi Santoso',
                'nis' => '28692905',
                'class' => 'XI TKJ 2',
                'eskul' => 'Music Club',
                'avatar' => 'avatar5.jpg',
                'status' => 'online',
                'mutual_friends' => 10,
                'joined_date' => '2023-08-25'
            ],
            [
                'id' => 6,
                'name' => 'Dewi Lestari',
                'nis' => '28692906',
                'class' => 'XII MM 1',
                'eskul' => 'Photography Club',
                'avatar' => 'avatar6.jpg',
                'status' => 'offline',
                'mutual_friends' => 9,
                'joined_date' => '2023-08-18'
            ]
        ]
    ]);
})->name('friend');

// otime route
Route::get('/otime', function () {
    return view('user/otime');
})->name('otime');

//admin route
Route::get('admin', function(){
    return view('admin/dashboard');
})->name('admin');

Route::get('/form', function(){
    return view('user/form');
})->name('form');




