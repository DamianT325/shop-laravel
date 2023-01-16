<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWordController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainPage::class, 'index']);
//Users
Route::delete('/user/{user}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/user/list', [UserController::class, 'index'])->middleware('auth')->name('user_list');

//products
Route::get('/products', [ProductController::class, 'index'])->middleware('auth')->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create'); //form create prod
Route::post('/products', [ProductController::class, 'store'])->middleware('auth')->name('products.store'); //form send
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit'); //form edit
Route::post('/products/{product}', [ProductController::class, 'update'])->middleware('auth')->name('products.update'); // update edit
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy'); // delete prod


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//test
