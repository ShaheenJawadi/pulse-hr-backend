<?php
namespace App\Http\Controllers\Structure;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\Utils\ApiResponse;
use App\Models\WorkPosition;


class PositionController extends Controller
{

    public function store(Request $request)
    {
        


        $validatedData = $request->validate([
            'designation' => 'required|string|max:255', 
        ]);

        $department = WorkPosition::create($validatedData);


        return ApiResponse::success($department, 'Poste created successfully!');
    }

}
