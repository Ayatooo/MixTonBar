<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\FavoriteController;

require __DIR__ . '/auth.php';

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/noalcohol', [HomeController::class, 'index'])->name('noalcohol');
Route::get('/recipe/{id}', [RecipesController::class, 'index'])->name('recipe');
Route::post('/search', [SearchController::class, 'searchByStr'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/add-favorite', [FavoriteController::class, 'updateStatus'])->name('favorite.updateStatus');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
});
