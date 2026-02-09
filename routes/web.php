<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Resident\DashboardController;
use App\Http\Controllers\Resident\IncidenceController;

Route::middleware(['auth', 'role:residente'])
    ->prefix('residente')
    ->name('residente.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/incidencias/crear', [IncidenceController::class, 'create'])
            ->name('incidencias.create');

        Route::post('/incidencias', [IncidenceController::class, 'store'])
            ->name('incidencias.store');

        Route::get('/incidencias', [IncidenceController::class, 'index'])
            ->name('incidencias.index');
    });

require __DIR__.'/auth.php';