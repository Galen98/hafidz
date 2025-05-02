<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\UstadzController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middleware([
    'auth',
    RoleMiddleware::class . ':0'
])->group(function () {
    //santri
    Route::get('/santri/add', [SantriController::class, 'add'])->name('santri.add');
    Route::post('/santri/store', [SantriController::class, 'store'])->name('santri.store');
    Route::delete('/santri/{id}', [SantriController::class, 'destroy'])->name('santri.destroy');
    Route::patch('/santri/{id}', [SantriController::class, 'update'])->name('santri.update');

    //ustadz
    Route::get('/ustadz', [UstadzController::class, 'index'])->name('ustadz.index');
    Route::get('/ustadz/add', [UstadzController::class, 'add'])->name('ustadz.add');
    Route::get('/ustadz/{id}', [UstadzController::class, 'view'])->name('ustadz.view');
    Route::post('/ustadz', [UstadzController::class, 'store'])->name('ustadz.store'); 
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
    Route::get('/santri/download', [SantriController::class, 'downloadQr'])->name('santri.download');
    Route::get('/santri/{id}', [SantriController::class, 'view'])->name('santri.view');
});

//api
Route::get('/api/generate-nis', [SantriController::class, 'generateNis']);

require __DIR__.'/auth.php';
