<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\
{
    DashboardController,
    CategoriesController,
    CountriesController,
    StoresController,
    StoreManagerController,
    PaymentCardController,
    SettingsController,
    VariationsController

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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');

Route::group(['prefix' => 'admin'], function ()
{
    Route::group(['middleware' => 'admin.guest'], function ()
    {
        Route::view('/login', 'admin.login')
            ->name('admin.login');
        Route::post('/login', [AdminController::class , 'authenticate'])
            ->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function ()
    {
        Route::get('/dashboard', [DashboardController::class , 'dashboard'])
            ->name('admin.dashboard');

        //categories
        Route::group(['prefix' => 'categories'], function ()
        {
            Route::get('/', [CategoriesController::class , 'index'])
                ->name('admin.categories');
            Route::get('/create', [CategoriesController::class , 'create'])
                ->name('admin.categories.create');
            Route::post('/store', [CategoriesController::class , 'store'])
                ->name('admin.categories.store');
            Route::post('/{id}/update', [CategoriesController::class , 'update'])
                ->name('admin.categories.update');
            Route::any('/{id}/destroy', [CategoriesController::class , 'destroy'])
                ->name('admin.categories.destroy');
            Route::get('/{id}/edit', [CategoriesController::class , 'edit'])
                ->name('admin.categories.edit');
            Route::get('/{id}/restore', [CategoriesController::class , 'restore'])
                ->name('admin.categories.restore');
            Route::get('/deleted', [CategoriesController::class , 'deleted'])
                ->name('admin.categories.deleted');
            Route::post('/check_status', [CategoriesController::class , 'check_status'])
                ->name('admin.categories.check_status');
        });

        Route::group(['prefix' => 'variations'], function()
        {
           Route::get('/', [VariationsController::class, 'index'])->name('admin.variations');
           Route::get('/create', [VariationsController::class, 'create'])->name('admin.variations.create');
           Route::post('/store', [VariationsController::class, 'store'])->name('admin.variations.store');
           Route::get('/{id}/edit', [VariationsController::class, 'edit'])->name('admin.variations.edit');
           Route::post('/{id}/update', [VariationsController::class, 'update'])->name('admin.variations.update');
           Route::any('/{id}/destroy', [VariationsController::class, 'destroy'])->name('admin.variations.destroy');
           Route::post('/check_status', [VariationsController::class, 'check_status'])->name('admin.variations.check_status');
           Route::get('/deleted', [VariationsController::class, 'deleted'])->name('admin.variations.deleted');
           Route::post('/restore', [VariationsController::class, 'restore'])->name('admin.variations.restore');
           Route::get('/show', [VariationsController::class, 'show'])->name('admin.variations.show');

        });

        //countries
        Route::group(['prefix' => 'countries'], function ()
        {
            Route::get('/', [CountriesController::class , 'index'])
                ->name('admin.countries');
            Route::get('/create', [CountriesController::class , 'create'])
                ->name('admin.countries.create');
            Route::post('/store', [CountriesController::class , 'store'])
                ->name('admin.countries.store');
            Route::post('/{id}/update', [CountriesController::class , 'update'])
                ->name('admin.countries.update');
            Route::any('/{id}/destroy', [CountriesController::class , 'destroy'])
                ->name('admin.countries.destroy');
            Route::get('/{id}/edit', [CountriesController::class , 'edit'])
                ->name('admin.countries.edit');
            Route::get('/{id}/restore', [CountriesController::class , 'restore'])
                ->name('admin.countries.restore');
            Route::get('/deleted', [CountriesController::class , 'deleted'])
                ->name('admin.countries.deleted');
            Route::post('/check_status', [CountriesController::class , 'check_status'])
                ->name('admin.countries.check_status');
        });

        //stores
        Route::group(['prefix'=>'stores'],function(){
            Route::get('/', [StoresController::class , 'index'])
                ->name('admin.stores');
            Route::get('/create', [StoresController::class , 'create'])
                ->name('admin.stores.create');
            Route::post('/store', [StoresController::class , 'store'])
                ->name('admin.stores.store');
            Route::post('/{id}/update', [StoresController::class , 'update'])
                ->name('admin.stores.update');
            Route::any('/{id}/destroy', [StoresController::class , 'destroy'])
                ->name('admin.stores.destroy');
            Route::get('/{id}/edit', [StoresController::class , 'edit'])
                ->name('admin.stores.edit');
            Route::get('/{id}/restore', [StoresController::class , 'restore'])
                ->name('admin.stores.restore');
            Route::get('/deleted', [StoresController::class , 'deleted'])
                ->name('admin.stores.deleted');
            Route::post('/check_status', [StoresController::class , 'checkStatus'])
                ->name('admin.stores.check_status');
        });

        //payment cards
        Route::post('/paymentCards', [PaymentCardController::class , 'store'])
            ->name('admin.paymentCards.store');

        //store manager
        Route::group(['prefix'=>'stores'],function(){
            Route::get('/{id}/store_manager', [StoreManagerController::class , 'index'])
                ->name('admin.stores.store_manager');

            Route::group(['prefix'=>'listings'],function(){
                Route::get('/', [StoreManagerController::class , 'listings'])
                    ->name('admin.stores.store_manager.listings');
                Route::get('/{id}/listing_details', [StoreManagerController::class , 'listing_details'])
                    ->name('admin.stores.store_manager.listings.listing_details');

                Route::get('/active', [StoreManagerController::class , 'active'])
                    ->name('admin.stores.store_manager.listings.active');
                Route::get('/deactive', [StoreManagerController::class , 'deactive'])
                    ->name('admin.stores.store_manager.listings.deactive');
                Route::get('/deleted', [StoreManagerController::class , 'deleted'])
                    ->name('admin.stores.store_manager.listings.deleted');
            });

        });

        //settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');

        //logout
        Route::get('/logout', [AdminController::class , 'logout'])
            ->name('admin.logout');
    });

});

