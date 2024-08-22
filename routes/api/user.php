<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/add', [UserController::class, 'store']);

Route::delete('/delete/{id}', [UserController::class, 'destroy']);

Route::get('/lister', [UserController::class, 'index']);

Route::get('/show/{id}', [UserController::class, 'show']);

Route::patch('/update/{id}', [UserController::class, 'update']);
