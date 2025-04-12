<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:guardian'])->group(function () {
    Route::get('/enrollments', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/', function () {
    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';
