<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;

/* category */
Route::get('/', [CategoryController::class, 'showAll'])->name('show_all_categories');

/* subcategory */
Route::get('/subcategories/{id}', [SubcategoryController::class, 'show'])->name('subcats_show');

/* ad */
Route::get('/ads/{id}', [AdController::class, 'show'])->name('show_ads');
Route::post('/ad/store', [AdController::class, 'store'])->name('ad_store');

/* user */
Route::get('/register', [UserController::class, 'registerForm'])->middleware('guest')->name('register_form');
Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
Route::post('/user/login', [UserController::class, 'login'])->name('user_login');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user_logout');

/* admin */
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::view('/', 'layouts.admin')->name('admin_main');
    Route::get('/ads', [AdController::class, 'showAll'])->name('admin_all_ads');
    Route::get('/active/ad/{id}', [AdController::class, 'active'])->name('admin_active_ad');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('admin_show_user');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin_user_update');
    Route::get('/users', [UserController::class, 'showAll'])->name('admin_all_users');
    Route::get('/active/user/{id}', [UserController::class, 'active'])->name('admin_active_user');
});



