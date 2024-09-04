<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;




 
Route::prefix('kanban')->group(function () {

    Route::get('/lister', [UtilsController::class, 'kanbanLister']);   
    Route::post('/update/{id}', [UtilsController::class, 'updateKanban']);   

});