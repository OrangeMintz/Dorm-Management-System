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

Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [AuthManager::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthManager::class, 'loginPost'])->name('loginPost')->middleware('guest');
    Route::get('/google', [GoogleController::class, 'loginWithGoogle'])->name('google');
    Route::any('/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
    Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {

    // Dashboard Routes
    Route::get('/dashboard', [Dashboard::class, 'viewDashboard']);

    // Tenant Routes
    Route::get('/tenants', [TenantController::class, 'viewTenants'])->name('tenants');
    Route::post('/tenants', [TenantController::class, 'tenantsPost'])->name('tenants.post');

    // User Routes
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'viewUsers'])->name('users');
        Route::get('/tenant_admin/get', [UsersController::class, 'get_admins'])->name('tenant_admin');
        Route::post('/', [UsersController::class, 'usersPost'])->name('users.post');
        Route::put('/{id}', [UsersController::class, 'usersPut'])->name('users.put');
        Route::delete('/{id}', [UsersController::class, 'usersDelete'])->name('users.delete');
        Route::get('/restore/{id}', [UsersController::class, 'usersRestore'])->name('users.restore');
        Route::get('/archived', [UsersController::class, 'viewUsers'])->name('archived.users');
    });

    // Employee Routes
    Route::get('/employees', [UsersController::class, 'viewEmployees'])->name('employees');

    // Boarders Routes
    Route::get('/boarders', [UsersController::class, 'viewEmployees'])->name('boarders');

    // Archived Tenants Route
    Route::get('/tenants/archived', [TenantController::class, 'viewTenants'])->name('tenants.archived');

    // Archived Dormitories Route
    Route::get('/dormitories/archived', function () {
        return view('dorm');
    })->name('dormitories.archived');

    // Subscription Route
    Route::get('/subscription', function () {
        return view('subscription');
    })->name('subscription');
});
