<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    
    public function getAllEmployees(Request $request): jsonResponse
    {
       
        try { 
            $employees = Employee::all();
 
            if ($employees->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'No employees found.',
                    'data' => [],
                ], 200);
            }
 
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $employees,
            ], 200);

        } catch (\Exception $e) { 
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
