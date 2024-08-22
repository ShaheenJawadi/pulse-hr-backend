<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;


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
    
        return response()->json([
            'message' => 'Candidate created successfully!',
            'candidate' => $candidate
        ], 201);
    }
    


    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['status' => 'error', 'message' => 'Candidate not found'], 404);
        }

        return response()->json($candidate);
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['status' => 'error', 'message' => 'Candidate not found'], 404);
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

        return response()->json([
            'message' => 'Candidate updated successfully!',
            'candidate' => $candidate
        ]);
    }

    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return response()->json(['status' => 'error', 'message' => 'Candidate not found'], 404);
        }

        $candidate->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Candidate deleted successfully'
        ], 200);
    }


}
