<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\PembinaController;

Route::get('/pembina', function () {
    return view('pembina.index');
});

Route::prefix('api')->group(function () {
    Route::resource('pembina', PembinaController::class);
});

// API atau aksi CRUD
//route login
Route::get('/login', [Authcontroller::class, 'showlogin'])->name('login');
Route::post('/login', [Authcontroller::class, 'login'])->name('login.post');
Route::get('/home', [Authcontroller::class, 'home'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/ekstrakurikuler', [EkskulController::class, 'viewData'])->name('admin.ekstrakurikuler');
Route::get('/admin/pembina', [PembinaController::class, 'viewData'])->name('admin.pembina');

Route::prefix('admin')->group(function () {
    Route::post('/pembina', [PembinaController::class, 'store'])->name('pembina.store');
    Route::put('/pembina/{id}', [PembinaController::class, 'update'])->name('pembina.update');
    Route::delete('/pembina/{id}', [PembinaController::class, 'destroy'])->name('pembina.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/ekstrakurikuler', [EkskulController::class, 'viewData'])->name('admin.ekstrakurikuler');
    Route::post('/ekstrakurikuler', [EkskulController::class, 'store'])->name('admin.ekstrakurikuler.store');
    Route::put('/ekstrakurikuler/{id}', [EkskulController::class, 'update'])->name('admin.ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{id}', [EkskulController::class, 'destroy'])->name('admin.ekstrakurikuler.delete');
});

Route::get('/form', [EkskulController::class, 'viewUser'])->name('form');


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

// eskul route
Route::get('/ekstrakurikuler', function () {
    return view('user/ekstrakurikuler');
})->name('ekstrakurikuler');

// settigs route
Route::get('/settings', function () {
    return view('user/settings');
})->name('settings');

// friends route
Route::get('/friends', function () {
    return view('user/friends', [
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
})->name('friends');

// otime route
Route::get('/timeo', function () {
    return view('user/timeo');
})->name('timeo');

//admin route
Route::get('admin', function(){
    return view('admin/dashboard');
})->name('admin');


