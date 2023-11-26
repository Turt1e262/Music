<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ListController;
use App\Http\Middleware\CheckAdminRole;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/song/upload', [SongController::class, 'upload'])->name('song.upload');

    Route::post('/song', [SongController::class, 'store'])->name('song.store');

    Route::get('/song', [SongController::class, 'index'])->name('song.index');



    Route::get('/song/list', [ListController::class, 'listFollowedUsers'])->name('song.list');
    Route::delete('/song/{id}', [ListController::class, 'deleteSong'])->name('song.destroy');

    Route::get('/song/edit/{id}', [ListController::class, 'editSong'])->name('song.edit');
    Route::put('/song/{id}', [ListController::class, 'updateSong'])->name('song.update');
});





Route::middleware('auth')->group(function () {



    Route::get('/dashboard', [ListController::class, 'listAllSongs'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('image/{path}', [ListController::class, 'showImage'])->name('song.image');
    Route::get('/musicstream/{path}', [ListController::class, 'streamMusic'])->name('song.stream');
});

require __DIR__ . '/auth.php';
