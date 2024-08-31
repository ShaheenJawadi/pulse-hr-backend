<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Structure\DepartmentController;
use App\Http\Controllers\Structure\PositionController;



Route::prefix('department')->group(function () {
    Route::get('/lister', [DepartmentController::class, 'index']);

    Route::post('/add', [DepartmentController::class, 'store']);

    Route::get('/show/{id}', [DepartmentController::class, 'show']);

    Route::put('/update/{id}', [DepartmentController::class, 'update']);

    Route::delete('/delete/{id}', [DepartmentController::class, 'destroy']);
});




Route::prefix('position')->group(function () {

    Route::post('/add', [PositionController::class, 'store']);
});
