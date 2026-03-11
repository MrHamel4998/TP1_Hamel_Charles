<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;

// #1
Route::get('/equipments', [EquipmentController::class, 'index']);
// #2
Route::get('/equipments/{id}', [EquipmentController::class, 'show']);
// #3
Route::get('/equipments/{id}/popularity', [EquipmentController::class, 'calculatePopularity']);
// #4
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
// #5
Route::put('/users/{id}', [UserController::class, 'update']);
// #6
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
// #7
Route::get('/equipments/{id}/average-rental-price', [EquipmentController::class, 'calculateAverageRentalPrice']);