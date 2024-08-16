<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Utils\ApiResponse;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    

 /**
     * @OA\Get(
     *     path="/api/employee",
     *     summary="Test employee endpoint",
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(type="object", @OA\Property(property="message", type="string"))
     *     )
     * )
     */
    public function getAllEmployees(Request $request): jsonResponse
    {
       
        try { 
            $employees = Employee::all();
 
            if ($employees->isEmpty()) {
                return ApiResponse::success([], 'No employees found.');
            }
            return ApiResponse::success($employees, 'success');
           

        } catch (\Exception $e) { 
            return ApiResponse::error("Failed", $e->getMessage());
        
        }
    }

}
