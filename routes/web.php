<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //santri
    Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
    Route::get('/santri/add', [SantriController::class, 'add'])->name('santri.add');
});

require __DIR__.'/auth.php';
