<?php

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


//Route::middleware('/teams')->group(function () {
//   Route::get('/newteam', [ProfileController::class, 'edit'])->name('newteam');
//});

/////////////// Teams /////////////////
/// View List Teams //////
Route::get('/teams', function () {
    return Inertia::render('Team/Teams');
})->middleware(['auth', 'verified'])->name('teams');
/// View New Team //////
Route::get('/newteam', function () {
    return Inertia::render('Team/NewTeam');
})->middleware(['auth', 'verified'])->name('newteam');

///  List,Destroy Team  ////
Route::apiResource('/allteams', TeamController::class)->middleware(['auth', 'verified']);
Route::post('/teams', [TeamController::class, 'store'])->name('team.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /////////////// Temporades /////////////////
    Route::get('/temporades', [TemporadaController::class, 'index'])->name('temporades.index');
    Route::resource('temporades', TemporadaController::class)->middleware(['auth', 'verified'])->except('index', 'show');
});


require __DIR__ . '/auth.php';
