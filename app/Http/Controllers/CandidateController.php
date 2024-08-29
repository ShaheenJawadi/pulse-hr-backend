<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Utils\ApiResponse;


class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return response()->json($candidates);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_offer_id' => 'required|exists:job_offers,id',
            'resume_path' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'submitted_at' => 'required|date',
            'last_status_change' => 'nullable|date',
            'employee_id' => 'nullable|exists:employees,employee_id', 
        ]);
    
        $candidate = Candidate::create($validatedData);
    
        return ApiResponse::success($candidate, 'Candidate created successfully!');
        
    }
    


    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
        return ApiResponse::error('Candidate not found');
 
        }
        return ApiResponse::success($candidate, ' success ');

         
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return ApiResponse::error('Candidate not found');

        }

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_offer_id' => 'required|exists:job_offers,id',
            'resume_path' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'submitted_at' => 'required|date',
            'last_status_change' => 'nullable|date',
        ]);

        $candidate->update($validatedData);

        return ApiResponse::success($candidate, 'Candidate updated successfully!');

  
    }

    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return ApiResponse::error('Candidate not found');
 
        }

        $candidate->delete();

     
        return ApiResponse::success($candidate,'Candidate deleted successfully');

    }


}
