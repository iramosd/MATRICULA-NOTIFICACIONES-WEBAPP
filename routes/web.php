<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//Route::redirect('/', '/login');

//Route::get('/login', LoginController::class)->name('login');
Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
});

require __DIR__.'/auth.php';
