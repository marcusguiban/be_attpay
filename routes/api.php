<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Public routes


Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
    Route::post('/login', [AuthController::class, 'login']);
// Protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [AuthController::class, 'user']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::put('/employees/{id}', [EmployeeController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
