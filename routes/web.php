<?php

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

Route::middleware("auth")->get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware("auth")->resource('categories', App\Http\Controllers\CategoriesController::class);
Route::middleware("auth")->resource('products', App\Http\Controllers\ProductsController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
