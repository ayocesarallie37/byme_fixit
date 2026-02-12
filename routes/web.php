<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Residente\IncidenciaController;
use App\Http\Controllers\Residente\DashboardController;

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

Route::middleware(['auth', 'role:residente'])
    ->prefix('residente')
    ->name('residente.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/incidencias', [IncidenciaController::class, 'index'])
            ->name('incidencias.index');

        Route::get('/incidencias/crear', [IncidenciaController::class, 'create'])
            ->name('incidencias.create');

        Route::post('/incidencias', [IncidenciaController::class, 'store'])
            ->name('incidencias.store');
    });

require __DIR__.'/auth.php';