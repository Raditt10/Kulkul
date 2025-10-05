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

// friends route
Route::get('/friends', function () {
    return view('friends', [
        'user' => [
            'name' => 'Alif',
            'nis' => '28692907',
            'username' => 'Username',
        ],
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
