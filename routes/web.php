<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::prefix('customer')->name('customer.')->group(function(){

    Route::middleware(['guest:customer', 'PreventBackHistory'])->group(function(){
        Route::get('/login', [CustomerController::class, 'index'])->name('login');
        Route::get('/register', [CustomerController::class, 'register'])->name('register');
        Route::post('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/check', [CustomerController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:customer', 'PreventBackHistory'])->group(function(){
        Route::get('/home', [CustomerController::class, 'show'])->name('home');
        Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::get('/login', [AdminController::class, 'index'])->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::get('/home', [AdminController::class, 'show'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/edit/customer/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/edit/customer/{id}', [AdminController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    });

});
