<?php

declare(strict_types=1);

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    //central domain => app.com
    //tenant1.app.com/
    
    Route::get('/', function () {
        return redirect(route('loginTenant'));
    });

    Route::get('/login', [TenantController::class, 'loginTenant'])->name('loginTenant')->middleware('guest');
    Route::post('/login', [TenantController::class, 'loginTenantPost'])->name('loginTenantPost')->middleware('guest');
    Route::post('/logout', [AuthManager::class, 'logout'])->name('logoutTenant');    
    Route::get('/dashboard', [Dashboard::class, 'viewTenantDashboard'])->name('tenantDashboard');
});
