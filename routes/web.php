<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StoreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>'admin.guest'], function(){
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.auth');
    });

    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/select_transaction', [AdminController::class, 'select_transaction'])->name('admin.select_transaction');
        Route::get('/administrator/dashboard', [DashboardController::class, 'dashboard'])->name('admin.administrator.dashboard');
        
        Route::get('stores/all-stores', [StoreController::class, 'all_stores'])->name('admin.stores.all-stores');
        Route::get('stores/create-stores', [StoreController::class, 'create_stores'])->name('admin.stores.create-stores');
        Route::post('stores/store', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('/stores/{id}/delete', [StoreController::class, 'delete'])->name('admin.stores.delete');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
