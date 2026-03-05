<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;

// #1
Route::get('/equipment', [EquipmentController::class, 'index']);
// #2
Route::get('/equipment/{id}', [EquipmentController::class, 'show']);
// #3
Route::get('/equipment/{id}/popularity', [EquipmentController::class, 'calculatePopularity']);
// #4
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
// #5
Route::put('/users/{id}', [UserController::class, 'update']);
// #6
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
// #7
Route::get('/equipment/{id}/average-rental-price', [EquipmentController::class, 'calculateAverageRentalPrice']);