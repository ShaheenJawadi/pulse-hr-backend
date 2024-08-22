<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;



Route::get('/lister', [DepartmentController::class, 'index']);   

Route::post('/add', [DepartmentController::class, 'store']);  

Route::get('/show/{id}', [DepartmentController::class, 'show']); 

Route::put('/update/{id}', [DepartmentController::class, 'update']); 

Route::delete('/delete/{id}', [DepartmentController::class, 'destroy']); 
