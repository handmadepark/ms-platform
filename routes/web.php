<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\{
    DashboardController,
    CategoriesController,
    CountriesController,
    StoresController,
    StoreManagerController,
    PaymentCardController,
    MessagesController
};
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
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

          //categories
          Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories');
          Route::get('/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
          Route::post('/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
          Route::post('/categories/{id}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
          Route::any('/categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
          Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
          Route::get('/categories/{id}/restore', [CategoriesController::class, 'restore'])->name('admin.categories.restore');
          Route::get('/categories/deleted', [CategoriesController::class, 'deleted'])->name('admin.categories.deleted');


          //countries
          Route::get('/countries', [CountriesController::class, 'index'])->name('admin.countries');
          Route::get('/countries/create', [CountriesController::class, 'create'])->name('admin.countries.create');
          Route::post('/countries/store', [CountriesController::class, 'store'])->name('admin.countries.store');
          Route::post('/countries/{id}/update', [CountriesController::class, 'update'])->name('admin.countries.update');
          Route::any('/countries/{id}/destroy', [CountriesController::class, 'destroy'])->name('admin.countries.destroy');
          Route::get('/countries/{id}/edit', [CountriesController::class, 'edit'])->name('admin.countries.edit');
          Route::get('/countries/{id}/restore', [CountriesController::class, 'restore'])->name('admin.countries.restore');
          Route::get('/countries/deleted', [CountriesController::class, 'deleted'])->name('admin.countries.deleted');

          //stores
          Route::get('/stores', [StoresController::class, 'index'])->name('admin.stores');
          Route::get('/stores/create', [StoresController::class, 'create'])->name('admin.stores.create');
          Route::post('/stores/store', [StoresController::class, 'store'])->name('admin.stores.store');
          Route::post('/stores/{id}/update', [StoresController::class, 'update'])->name('admin.stores.update');
          Route::any('/stores/{id}/destroy', [StoresController::class, 'destroy'])->name('admin.stores.destroy');
          Route::get('/stores/{id}/edit', [StoresController::class, 'edit'])->name('admin.stores.edit');
          Route::get('/stores/{id}/restore', [StoresController::class, 'restore'])->name('admin.stores.restore');
          Route::get('/stores/deleted', [StoresController::class, 'deleted'])->name('admin.stores.deleted');
          Route::post('/stores/check_status', [StoresController::class, 'checkStatus'])->name('admin.stores.check_status');

          //payment cards
          Route::post('/paymentCards', [PaymentCardController::class, 'store'])->name('admin.paymentCards.store');

          //store manager
          Route::get('/stores/{id}/store_manager', [StoreManagerController::class, 'index'])->name('admin.stores.store_manager');
          Route::get('/stores/store_manager/listings', [StoreManagerController::class, 'listings'])->name('admin.stores.store_manager.listings');
          Route::post('/stores/store_manager/getListings', [StoreManagerController::class, 'getListings'])->name('admin.stores.store_manager.getListings');

          //messages
          Route::get('/stores/store_manager/messages', [MessagesController::class, 'index'])->name('admin.stores.store_manager.messages');

          //logout
          Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    });


});
