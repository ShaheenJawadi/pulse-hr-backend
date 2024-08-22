<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    
    public function index()
    {
        $departments = Department::all();
        return response()->json($departments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_id' => 'nullable|exists:employees,employee_id', 
        ]);

        $department = Department::create($validatedData);

        return response()->json([
            'message' => 'Department created successfully!',
            'department' => $department
        ], 201);
    }
    


    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['status' => 'error', 'message' => 'Department not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'manager_id' => 'nullable|exists:employees,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->errors()
            ], 422);
        }

        $department->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Department updated successfully',
            'department' => $department
        ], 200);
    }

    public function show($id)
{
    $department = Department::find($id);

    if (!$department) {
        return response()->json(['status' => 'error', 'message' => 'Department not found'], 404);
    }

    return response()->json($department, 200);
}


    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['status' => 'error', 'message' => 'Department not found'], 404);
        }

        $department->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Department deleted successfully'
        ], 200);
    }

}
