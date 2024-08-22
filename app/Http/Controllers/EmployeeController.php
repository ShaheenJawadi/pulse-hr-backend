<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Validator;
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

    public function index()
    {
        $employees = Employee::with(['user', 'department'])->get();
        return response()->json($employees);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'hire_date' => 'required|date',
            'contract_type' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'position' => 'required|string',
        ]);

        $employee = Employee::create($validatedData);

        return response()->json($employee, 201);
    }


    public function show(string $id)
    {
        $employee = Employee::with(['user', 'department'])->find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ], 404);
        }

        return response()->json($employee);
    }


    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'sometimes|exists:users,id',
            'hire_date' => 'sometimes|date',
            'contract_type' => 'sometimes|string',
            'department_id' => 'sometimes|exists:departments,id',
            'position' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->errors()
            ], 422);
        }

        $employee->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Employee updated successfully',
            'employee' => $employee
        ]);
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ], 404);
        }

        $employee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Employee deleted successfully'
        ]);
    }

}
