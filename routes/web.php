<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware' => "web"], function () {
    Route::get('/login', [AuthManager::class, 'login'])->name(name: 'login')->middleware('guest');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name(name: 'loginPost')->middleware('guest');
    Route::get('/google', [GoogleController::class, 'loginWithGoogle'])->name('google');
    Route::any('/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
    Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'web'], function () {
        Route::get('/dashboard', [Dashboard::class, 'viewDashboard']);
    });

    Route::post('/users', [UsersController::class, 'usersPost'])->name('users.post');
    Route::get('/users', [UsersController::class, 'viewUsers'])->name('users');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');

    Route::get('/tenants', function () {
        return view('tenants');
    });

    Route::get('/dormitories', function () {
        return view('dorm');
    });
});
