<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.create');
});

Route::middleware(['checkuser'])->group(function(){
    Route::get('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::resource('/product',ProductController::class)->except('destroy');
    Route::get('/logout',[LoginController::class,'Logout'])->name('logout');
});

Route::get('/login/create',[LoginController::class,'LoginCreate'])->name('login.create');
Route::post('/login',[LoginController::class,'Login'])->name('login');

