<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AcademyController;
use App\Http\Controllers\Api\CommunicationController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CustomAuthenticatedSessionController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\PaymentController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [CustomAuthenticatedSessionController::class, 'store']);
Route::middleware(['auth:sanctum'])->post('/logout', [CustomAuthenticatedSessionController::class, 'destroy']);

Route::middleware(['auth:sanctum'])->prefix('/v1')->as('api.')->group(function () {
    Route::apiResource('/academies', AcademyController::class);
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/payments', PaymentController::class);
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/communications', CommunicationController::class);
    Route::apiResource('/enrollments', EnrollmentController::class);
});