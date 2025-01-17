<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
 
Route::post('/add', [EmployeeController::class, 'store']);






Route::get('/lister', [EmployeeController::class, 'index']);
Route::get('/show/{id}', [EmployeeController::class, 'show']);

Route::put('/update/{id}', [EmployeeController::class, 'update']);

Route::delete('/delete/{id}', [EmployeeController::class, 'destroy']);  