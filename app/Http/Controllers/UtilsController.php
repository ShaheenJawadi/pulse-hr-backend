<?php

namespace App\Http\Controllers;

use App\Models\KanbanColumn;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;

class UtilsController extends Controller


{

    public function kanbanLister()
    {
        $kanbanData = KanbanColumn::with(['tasks'])->get();


        return ApiResponse::success($kanbanData, 'success ');
    }
}
