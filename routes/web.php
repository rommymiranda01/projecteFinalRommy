<?php

use App\Http\Controllers\Entrada\EntradaController;
use App\Http\Controllers\Jornada\JornadaController;
use App\Http\Controllers\Jugador\JugadorController;
use App\Http\Controllers\Partit\PartitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\Temporada\TemporadaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /////////////// Temporades /////////////////
    Route::resource('temporades', TemporadaController::class)->middleware(['auth', 'verified'])->except('show');

    /////////////// Teams /////////////////
    Route::resource('teams', TeamController::class)->middleware(['auth', 'verified'])->except('show');

    /////////////// Jugadors /////////////////
    Route::resource('jugadors', JugadorController::class)->middleware(['auth', 'verified'])->except('show');
    Route::get('/jugadorsteams/{id}', [JugadorController::class, 'JugadorsTeams'])->name('jugadorsteams');

    /////////////// Jornades /////////////////
    Route::resource('jornades', JornadaController::class)->middleware(['auth', 'verified'])->except('show');

    /////////////// Partits /////////////////
    Route::resource('partits', PartitController::class)->middleware(['auth', 'verified'])->except('show');
    Route::get('/partitsteams', [PartitController::class, 'PartitsTeam'])->name('partitsteams');

    /////////////// Entrades /////////////////
    Route::resource('entrades', EntradaController::class)->middleware(['auth', 'verified']);
    Route::get('/partitsentrada/{id}', [EntradaController::class, 'PartitsEntrada'])->name('partitsentrada');

});



require __DIR__ . '/auth.php';
