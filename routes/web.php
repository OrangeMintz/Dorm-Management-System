<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TenantController;

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

    //Dashboard Routes
    Route::group(['middleware' => 'web'], function () {
        Route::get('/dashboard', [Dashboard::class, 'viewDashboard']);
    });

    //User Routes
    Route::post('/users', [UsersController::class, 'usersPost'])->name('users.post');
    Route::put('/users/{id}', [UsersController::class, 'usersPut'])->name('users.put');
    Route::delete('/users/{id}', [UsersController::class, 'usersDelete'])->name('users.delete');
    // Route::delete('/users/{id}', [UsersController::class, 'usersForceDelete'])->name('users.forceDelete');
    // Route::delete('/users/{id}', [UsersController::class, 'usersRestore'])->name('users.restore');


    Route::get('/users', [UsersController::class, 'viewUsers'])->name('users');
    Route::get('/users/tenant_admin/get', [UsersController::class, 'get_admins'])->name('tenant_admin');

    //Tenant Routes
    Route::get('/tenants', [TenantController::class, 'viewTenants'])->name('tenants');
    Route::post('/tenants', [TenantController::class, 'tenantsPost'])->name('tenants.post');

    Route::get('/dormitories', function () {
        return view('dorm');
    });

    Route::get('/subscription', function () {
        return view('subscription');
    });
});
