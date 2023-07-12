<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Bagian Frontend
|--------------------------------------------------------------------------
|
*/

Auth::routes();


    //templates
   Route::get('/', [App\Http\Controllers\Frontend\DashboardController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Bagian Customer
|--------------------------------------------------------------------------
*/
//Customer Authentication
Route::get('/user/login', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'LoadLogin'])->name('frontend.login');
Route::post('/user/customer-login', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'CustomerLogin'])->name('frontend.customer-login');
Route::get('/user/register', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'LoadRegister'])->name('frontend.register');
Route::post('/user/customer-register', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'CustomerRegister'])->name('frontend.customer-register');
Route::get('/user/reset', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'LoadReset'])->name('frontend.reset');
Route::post('/user/resetPassword', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'resetPassword'])->name('frontend.resetPassword');
Route::post('/user/resetPasswordUpdate', [App\Http\Controllers\Frontend\CustomerAuthController::class, 'resetPasswordUpdate'])->name('frontend.resetPasswordUpdate');

/*
|--------------------------------------------------------------------------
| Bagian Admin
|--------------------------------------------------------------------------
*/
Route::prefix('backend')->group(function () {

    //Not Found Page
    Route::get('/notfound', [App\Http\Controllers\HomeController::class, 'notFoundPage'])->name('backend.notfound')->middleware('auth');

	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard')->middleware(['auth','is_admin']);

    // Category
	Route::get('/category', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('backend.category.list')->middleware(['auth','is_admin']);
    // Route::get('/category/create', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('backend.category.create')->middleware(['auth','is_admin']);
    Route::post('/category/store', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('backend.category.store')->middleware(['auth', 'is_admin']);
    // Route::get('/category/{id}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('backend.category.edit')->middleware(['auth','is_admin']);
    Route::put('/category/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('backend.category.update')->middleware(['auth','is_admin']);
    Route::delete('/category/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('backend.category.destroy')->middleware(['auth','is_admin']);

    //Patner
    Route::get('/partner', [App\Http\Controllers\Backend\PartnerController::class, 'index'])->name('backend.partners.list')->middleware(['auth','is_admin']);
     Route::get('/partner/create', [App\Http\Controllers\Backend\PartnerController::class, 'create'])->name('backend.partners.create')->middleware(['auth','is_admin']);
     Route::post('/partner/store', [App\Http\Controllers\Backend\PartnerController::class, 'store'])->name('backend.partners.store')->middleware(['auth','is_admin']);
     Route::get('/partner/{id}/edit', [App\Http\Controllers\Backend\PartnerController::class, 'edit'])->name('backend.partners.edit')->middleware(['auth','is_admin']);
     Route::put('/partner/{id}', [App\Http\Controllers\Backend\PartnerController::class, 'update'])->name('backend.partners.update')->middleware(['auth','is_admin']);
     Route::delete('/partner/{id}', [App\Http\Controllers\Backend\PartnerController::class, 'destroy'])->name('backend.partners.destroy')->middleware(['auth','is_admin']);

    //amenity
    Route::get('/amenity', [App\Http\Controllers\Backend\AmenityController::class, 'index'])->name('backend.amenity.list')->middleware(['auth','is_admin']);
    Route::post('/amenity/store', [App\Http\Controllers\Backend\AmenityController::class, 'store'])->name('backend.amenity.store')->middleware(['auth','is_admin']);
    Route::put('/amenity/{id}', [App\Http\Controllers\Backend\AmenityController::class, 'update'])->name('backend.amenity.update')->middleware(['auth','is_admin']);
    Route::delete('/amenity/{id}', [App\Http\Controllers\Backend\AmenityController::class, 'destroy'])->name('backend.amenity.destroy')->middleware(['auth','is_admin']);


    // Venues
    Route::get('/venues', [App\Http\Controllers\Backend\VenuesController::class, 'index'])->name('backend.venues.list')->middleware(['auth','is_admin']);
    Route::get('/venues/create', [App\Http\Controllers\Backend\VenuesController::class, 'create'])->name('backend.venues.create')->middleware(['auth','is_admin']);
    Route::post('/venues/store', [App\Http\Controllers\Backend\VenuesController::class, 'store'])->name('backend.venues.store')->middleware(['auth','is_admin']);
    Route::get('/venues/{id}/edit', [App\Http\Controllers\Backend\VenuesController::class, 'edit'])->name('backend.venues.edit')->middleware(['auth','is_admin']);
    Route::put('/venues/{id}', [App\Http\Controllers\Backend\VenuesController::class, 'update'])->name('backend.venues.update')->middleware(['auth','is_admin']);
    Route::delete('/venues/{id}', [App\Http\Controllers\Backend\VenuesController::class, 'destroy'])->name('backend.venues.destroy')->middleware(['auth','is_admin']);

    //Location
    Route::get('/location', [App\Http\Controllers\Backend\LocationController::class, 'index'])->name('backend.location.index')->middleware(['auth', 'is_admin']);
    Route::post('/location/store', [App\Http\Controllers\Backend\LocationController::class, 'store'])->name('backend.location.store')->middleware(['auth', 'is_admin']);
    Route::put('/location/{id}', [App\Http\Controllers\Backend\LocationController::class, 'update'])->name('backend.location.update')->middleware(['auth', 'is_admin']);
    Route::delete('/location/{id}', [App\Http\Controllers\Backend\LocationController::class, 'destroy'])->name('backend.location.destroy')->middleware(['auth', 'is_admin']);

    // Service
    Route::get('/service', [App\Http\Controllers\Backend\ServiceController::class, 'index'])->name('backend.service.list')->middleware(['auth','is_admin']);
    Route::get('/service/create', [App\Http\Controllers\Backend\ServiceController::class, 'create'])->name('backend.service.create')->middleware(['auth','is_admin']);
    Route::post('/service/store', [App\Http\Controllers\Backend\ServiceController::class, 'store'])->name('backend.service.store')->middleware(['auth','is_admin']);
    Route::get('/service/{id}/edit', [App\Http\Controllers\Backend\ServiceController::class, 'edit'])->name('backend.service.edit')->middleware(['auth','is_admin']);
    Route::put('/service/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'update'])->name('backend.service.update')->middleware(['auth','is_admin']);
    Route::delete('/service/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'destroy'])->name('backend.service.destroy')->middleware(['auth','is_admin']);

});

/*
|--------------------------------------------------------------------------
| Bagian Partner
|--------------------------------------------------------------------------
*/
//Partner Authentication
Route::get('/partner/register', [App\Http\Controllers\Backend\PartnerController::class, 'FormPartnerRegister'])->name('frontend.partner-register');
Route::post('/partner/partner-register', [App\Http\Controllers\Backend\PartnerController::class, 'PartnerRegister'])->name('frontend.partnerRegister');
