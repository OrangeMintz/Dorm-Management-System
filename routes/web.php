<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Dashboard;


Route::get('/',function(){
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware'=>"web"],function(){
    Route::get('/login', [AuthManager::class, 'login'])->name(name: 'login')->middleware('guest');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name(name: 'loginPost')->middleware('guest');
    Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
});

Route::group(['middleware'=>"web"],function(){
    Route::get('/dashboard', [Dashboard::class, 'viewDashboard'])->middleware('auth');
});



