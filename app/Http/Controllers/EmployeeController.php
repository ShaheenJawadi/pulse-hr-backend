<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Utils\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{







    public function store(Request $request)
    {
        $validatedData = $request->validate([
       
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birthday' => 'required|string',
            'sexe' => 'required|in:h,f',
            'avatar' => 'nullable',
         
            'department_id' => 'required|numeric',
            'position_id' => 'required|numeric',
            'supervisor_id' => 'nullable|numeric',
            'shift_id' => 'required|numeric',
            'hire_date' => 'required|string',
            'contract_type_id' => 'required|numeric',
            'end_contract' => 'nullable|string',
            'user_id' => 'nullable|numeric',
            'additional_infos' => 'required|array',
            'additional_infos.contactName' => 'required|string',
            'additional_infos.contactRelation' => 'required|string',
            'additional_infos.contactPhone' => 'required|string',
            'additional_infos.maritalStatus' => 'required|string',
            'additional_infos.bloodGroup' => 'required|string',
        ]);
        
        
        $employee = Employee::create($validatedData);
        
        return ApiResponse::success($employee, 'Employee created successfully!');
         
    }






    
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
