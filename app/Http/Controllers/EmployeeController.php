<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Utils\ApiResponse;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    
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
