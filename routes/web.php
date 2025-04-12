<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

//Route::redirect('/', '/login');

//Route::get('/login', LoginController::class)->name('login');
//->middleware(['auth'])
Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/enrollments', [EnrollmentController::class, 'create'])->name('enrollments.create');


Route::get('/', function () {
    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';
