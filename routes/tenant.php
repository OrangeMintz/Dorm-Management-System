<?php

declare(strict_types=1);

use App\Http\Controllers\AuthManager;
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

    Route::get('/', [AuthManager::class, 'loginTenant'])->name('loginTenant')->middleware('guest');
    

});


// Route::group(['middleware' => 'web',
// InitializeTenancyByDomain::class,
// PreventAccessFromCentralDomains::class,
// ], function () {
//     Route::get('/', function () {

//                 $domain = tenant('domain');
        
//                 return "<center><h1>$domain login page!</h1></center>";
        
//             });
//     // Route::get('/', [AuthManager::class, 'loginTenant'])->name('login')->middleware('guest');
//     // Route::post('/', [AuthManager::class, 'loginPost'])->name('loginPost')->middleware('guest');
//     // Route::get('/google', [GoogleController::class, 'loginWithGoogle'])->name('google');
//     // Route::any('/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
//     // Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');
// });
