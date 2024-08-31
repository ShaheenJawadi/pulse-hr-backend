<?php
namespace App\Http\Controllers\Structure;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Utils\ApiResponse; 


class DepartmentController extends Controller
{
////////////////////Depatment////////////////////////
    public function index()
    {
        $departments = Department::all();
        return ApiResponse::success($departments, 'success ');
    }

    public function store(Request $request)
    {
        


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_id' => 'nullable|exists:employees,employee_id',
        ]);

        $department = Department::create($validatedData);


        return ApiResponse::success($department, 'Department created successfully!');
    }



    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        if (!$department) {
            return ApiResponse::error('Department not found');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'manager_id' => 'nullable|exists:employees,id',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Department not found', $validator->errors());;
        }

        $department->update($request->all());

        return ApiResponse::success($department, 'Department updated successfully!');
    }

    public function show($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return ApiResponse::error('Department not found');
        }

        return ApiResponse::success($department, ' success ');
    }


    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return ApiResponse::error('Department not found');
        }

        $department->delete();


        return ApiResponse::success($department, 'Department deleted successfully');
    }
 

}
