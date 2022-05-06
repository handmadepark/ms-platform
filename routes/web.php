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
    VariationsController,
    VariationOptionsController,
    SizeController,
    SizeOptionsController,
    PriceVariationsController
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

        Route::group(['prefix' => 'pv'], function ()
        {
            Route::get('/', [PriceVariationsController::class , 'index'])
                ->name('admin.pv');
            Route::get('/create', [PriceVariationsController::class , 'create'])
                ->name('admin.pv.create');
            Route::post('/store', [PriceVariationsController::class , 'store'])
                ->name('admin.pv.store');
            Route::post('/{id}/update', [PriceVariationsController::class , 'update'])
                ->name('admin.pv.update');
            Route::any('/{id}/destroy', [PriceVariationsController::class , 'destroy'])
                ->name('admin.pv.destroy');
            Route::get('/{id}/edit', [PriceVariationsController::class , 'edit'])
                ->name('admin.pv.edit');
            Route::get('/{id}/restore', [PriceVariationsController::class , 'restore'])
                ->name('admin.pv.restore');
            Route::get('/deleted', [PriceVariationsController::class , 'deleted'])
                ->name('admin.pv.deleted');
            Route::post('/check_status', [PriceVariationsController::class , 'check_status'])
                ->name('admin.pv.check_status');
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
           Route::post('/{id}/restore', [VariationsController::class, 'restore'])->name('admin.variations.restore');
           Route::get('/show', [VariationsController::class, 'show'])->name('admin.variations.show');

        });

        Route::group(['prefix' => 'options'], function()
        {
           Route::get('/', [VariationOptionsController::class, 'index'])->name('admin.options');
           Route::get('/create', [VariationOptionsController::class, 'create'])->name('admin.options.create');
           Route::post('/store', [VariationOptionsController::class, 'store'])->name('admin.options.store');
           Route::get('/{id}/edit', [VariationOptionsController::class, 'edit'])->name('admin.options.edit');
           Route::post('/{id}/update', [VariationOptionsController::class, 'update'])->name('admin.options.update');
           Route::any('/{id}/destroy', [VariationOptionsController::class, 'delete'])->name('admin.options.delete');
           Route::post('/check_status', [VariationOptionsController::class, 'check_status'])->name('admin.options.check_status');
           Route::get('/deleted', [VariationOptionsController::class, 'deleted'])->name('admin.options.deleted');
           Route::post('/{id}/restore', [VariationOptionsController::class, 'restore'])->name('admin.options.restore');
           Route::get('/show', [VariationOptionsController::class, 'show'])->name('admin.options.show');

        });

        Route::group(['prefix' => 'sizes'], function()
        {
           Route::get('/', [SizeController::class, 'index'])->name('admin.sizes');
           Route::get('/create', [SizeController::class, 'create'])->name('admin.sizes.create');
           Route::post('/store', [SizeController::class, 'store'])->name('admin.sizes.store');
           Route::get('/{id}/edit', [SizeController::class, 'edit'])->name('admin.sizes.edit');
           Route::post('/{id}/update', [SizeController::class, 'update'])->name('admin.sizes.update');
           Route::any('/{id}/destroy', [SizeController::class, 'delete'])->name('admin.sizes.delete');
           Route::post('/check_status', [SizeController::class, 'check_status'])->name('admin.sizes.check_status');
           Route::get('/deleted', [SizeController::class, 'deleted'])->name('admin.sizes.deleted');
           Route::get('/{id}/restore', [SizeController::class, 'restore'])->name('admin.sizes.restore');
           Route::get('/show', [SizeController::class, 'show'])->name('admin.sizes.show');

        });

        Route::group(['prefix' => 'size_options'], function()
        {
           Route::get('/', [SizeOptionsController::class, 'index'])->name('admin.size_options');
           Route::get('/create', [SizeOptionsController::class, 'create'])->name('admin.size_options.create');
           Route::post('/store', [SizeOptionsController::class, 'store'])->name('admin.size_options.store');
           Route::get('/{id}/edit', [SizeOptionsController::class, 'edit'])->name('admin.size_options.edit');
           Route::post('/{id}/update', [SizeOptionsController::class, 'update'])->name('admin.size_options.update');
           Route::any('/{id}/destroy', [SizeOptionsController::class, 'delete'])->name('admin.size_options.delete');
           Route::post('/check_status', [SizeOptionsController::class, 'check_status'])->name('admin.size_options.check_status');
           Route::get('/deleted', [SizeOptionsController::class, 'deleted'])->name('admin.size_options.deleted');
           Route::get('/{id}/restore', [SizeOptionsController::class, 'restore'])->name('admin.size_options.restore');
           Route::get('/show', [SizeOptionsController::class, 'show'])->name('admin.size_options.show');

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
                Route::get('create', [StoreManagerController::class, 'create'])
                    ->name('admin.stores.store_manager.listings.create');

                Route::get('/active', [StoreManagerController::class , 'active'])
                    ->name('admin.stores.store_manager.listings.active');
                Route::get('/deactive', [StoreManagerController::class , 'deactive'])
                    ->name('admin.stores.store_manager.listings.deactive');
                Route::get('/deleted', [StoreManagerController::class , 'deleted'])
                    ->name('admin.stores.store_manager.listings.deleted');

                Route::get('/gv/{id}', [StoreManagerController::class , 'gv'])->name('gv');
                Route::get('/gso/{id}', [StoreManagerController::class , 'gso'])->name('gso');
            });

        });

        //settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
        Route::post('/settings/create_input', [SettingsController::class, 'create_input'])->name('admin.settings.create_input');
        Route::post('/settings/create_scale', [SettingsController::class, 'create_scale'])->name('admin.settings.create_scale');
        Route::post('/settings/check_scale_status', [SettingsController::class, 'check_scale_status'])->name('admin.settings.check_scale_status');
        Route::any('/{id}/destroy_input', [SettingsController::class , 'destroy_input'])
                ->name('admin.settings.destroyInput');
        Route::any('{id}/destroy_scale', [SettingsController::class, 'destroy_scale'])->name('admin.settings.destroy_scale');
        
        
        //logout
        Route::get('/logout', [AdminController::class , 'logout'])
            ->name('admin.logout');
    });

});

