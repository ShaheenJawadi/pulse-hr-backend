<?php

namespace App\Http\Controllers;

use App\Models\KanbanColumn;
use App\Models\KanbanTask;


use Illuminate\Http\Request;
use App\Utils\ApiResponse;

class UtilsController extends Controller


{

    public function kanbanLister()
    {
        $kanbanData = KanbanColumn::with(['tasks'])->get();


        return ApiResponse::success($kanbanData, 'success ');
    }


    public function updateKanban(Request $request)
    {
        $data = $request->input('data');  

        foreach ($data as $columnData) {
          
            foreach ($columnData['tasks'] as $taskData) {
                KanbanTask::where('id', $taskData['id'])->update( 
                    [
                        'column_id' => $taskData['column_id'],
                        'displayOrder' => $taskData['displayOrder'], 
                    ]
                );
 
           
            }
        }

        return response()->json(['message' => 'Data updated successfully'], 200);
    }
    
}
