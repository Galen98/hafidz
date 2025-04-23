<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middleware([
    'auth',
    RoleMiddleware::class . ':0'
])->group(function () {
    //santri
    Route::get('/santri/add', [SantriController::class, 'add'])->name('santri.add');
    Route::post('/santri/store', [SantriController::class, 'store'])->name('santri.store');
});

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
});

//api
Route::get('/api/generate-nis', [SantriController::class, 'generateNis']);

require __DIR__.'/auth.php';
