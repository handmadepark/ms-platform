<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::prefix('admin')->group(function (){
        Route::middleware('admin.guest')->group(function(){
            Route::view('/login', 'admin.login')->name('admin.login');
            Route::post('/login', [\App\Http\Controllers\AdminController::class , 'authenticate'])
                ->name('admin.auth');
        });

        Route::middleware('admin.auth')->group(function(){
            Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class , 'dashboard'])
                ->name('admin.dashboard');
        });
    });
