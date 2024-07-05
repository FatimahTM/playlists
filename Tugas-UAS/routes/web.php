<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


// Rute untuk profil pengguna
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');





// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth routes (Breeze)
require __DIR__.'/auth.php';

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lagus/create', [LaguController::class, 'create'])->name('lagus.create');

});


// Artist routes
Route::middleware('auth')->group(function () {
    Route::resource('artists', ArtistController::class);
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::get('/artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');
});

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware('auth')
->name('logout');






// Album routes
Route::middleware('auth')->group(function () {
    Route::resource('albums', AlbumController::class);
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');

});


// Song routes
Route::middleware('auth')->group(function () {
    Route::resource('lagus', LaguController::class);
    Route::resource('lagu', LaguController::class);
    Route::put('/lagus/{lagu}', [LaguController::class, 'update'])->name('lagus.update');
    Route::get('/lagus/{lagu}/edit', [LaguController::class, 'edit'])->name('lagus.edit');
    Route::get('/lagus/create', [LaguController::class, 'create'])->name('lagus.create');




});

