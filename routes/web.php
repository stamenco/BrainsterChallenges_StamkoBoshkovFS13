<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/matches', [GameController::class, 'index'])->name('matches.index');

    Route::middleware('admin')->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home.index');

        Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
        Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
        Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
        Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

        Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
        Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
        Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
        Route::get('/players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
        Route::put('/players/{player}', [PlayerController::class, 'update'])->name('players.update');
        Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

        Route::get('/matches/create', [GameController::class, 'create'])->name('matches.create');
        Route::post('/matches', [GameController::class, 'store'])->name('matches.store');
        Route::get('/matches/{game}/edit', [GameController::class, 'edit'])->name('matches.edit');
        Route::put('/matches/{game}', [GameController::class, 'update'])->name('matches.update');
        Route::delete('/matches/{game}', [GameController::class, 'destroy'])->name('matches.destroy');
    });
});

require __DIR__ . '/auth.php';
