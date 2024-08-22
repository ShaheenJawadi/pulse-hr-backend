<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

//Route::get("/lister", [EmployeeController::class, 'getAllEmployees']);

Route::get('/lister', [EmployeeController::class, 'index']);

Route::post('/add', [EmployeeController::class, 'store']);

Route::get('/show/{id}', [EmployeeController::class, 'show']);

Route::put('/update/{id}', [EmployeeController::class, 'update']);

Route::delete('/delete/{id}', [EmployeeController::class, 'destroy']);  