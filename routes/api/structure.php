<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Structure\DepartmentController;


Route::prefix('department')->group(function () {
    Route::get('/lister', [DepartmentController::class, 'department_index']);

    Route::post('/add', [DepartmentController::class, 'department_store']);

    Route::get('/show/{id}', [DepartmentController::class, 'department_show']);

    Route::put('/update/{id}', [DepartmentController::class, 'department_update']);

    Route::delete('/delete/{id}', [DepartmentController::class, 'department_destroy']);
});
