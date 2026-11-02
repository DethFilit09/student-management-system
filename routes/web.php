<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('departments', DepartmentController::class)->except('show');

    // Breeze profile pages (only registered when Breeze is installed)
    if (class_exists(\App\Http\Controllers\ProfileController::class)) {
        Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    }
});

// Login / register / logout routes (provided by Breeze, or by fallback-without-breeze/)
require __DIR__ . '/auth.php';
