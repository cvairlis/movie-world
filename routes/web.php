<?php

use App\Http\Controllers\MoviesController;
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
    return Inertia::render('Main');
})->name('main');

Route::middleware(['auth:sanctum', 'verified'])->get('/movie/create', [MoviesController::class, 'create'])->name('movie.create');

Route::post('/movie/create', [MoviesController::class, 'store'])->middleware(['auth'])->name('movie.create.store');
