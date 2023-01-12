<?php
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

Route::get('/', function () {
    return view('welcome');
});

Route::delete('/user/{user}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/user/list', [UserController::class, 'index'])->middleware('auth')->name('user_list');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//test
