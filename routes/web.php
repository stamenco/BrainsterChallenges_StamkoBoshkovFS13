<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('login', [UserController::class, 'create'])->name('login');
Route::post('store', [UserController::class, 'store'])->name('store');
Route::get('/clear', [UserController::class, 'clear'])->name('clear');
