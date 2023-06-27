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

Route::get('/', function () {
    return view('frontend/welcome');
});

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
Route::prefix('backend')->group(function(){

    //Not Found Page
	Route::get('/notfound', [App\Http\Controllers\HomeController::class, 'notFoundPage'])->name('backend.notfound')->middleware('auth');

	//Dashboard
	Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard')->middleware(['auth','is_admin']);
	Route::get('/category', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('backend.category.list')->middleware(['auth','is_admin']);
    Route::get('/category/create', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('backend.category.create')->middleware(['auth','is_admin']);
    Route::post('/category/store', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('backend.category.store')->middleware(['auth','is_admin']);
    Route::get('/category/{id}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('backend.category.edit')->middleware(['auth','is_admin']);
    Route::put('/category/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('backend.category.update')->middleware(['auth','is_admin']);
    Route::delete('/category/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('backend.category.destroy')->middleware(['auth','is_admin']);
});

/*
|--------------------------------------------------------------------------
| Bagian Partner
|--------------------------------------------------------------------------
*/
//Partner Authentication
Route::get('/partner/register', [App\Http\Controllers\Backend\PartnerController::class, 'FormPartnerRegister'])->name('frontend.partner-register');
Route::post('/partner/partner-register', [App\Http\Controllers\Backend\PartnerController::class, 'PartnerRegister'])->name('frontend.partnerRegister');
