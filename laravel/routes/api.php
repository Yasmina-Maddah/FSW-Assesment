<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users/update', [UserController::class, 'update']);
Route::post('users/delete', [UserController::class, 'destroy']);
