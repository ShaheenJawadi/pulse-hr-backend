<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index()
    {
        $jobOffers = JobOffer::all();
        return response()->json($jobOffers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'posting_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $jobOffer = JobOffer::create($validatedData);

        return response()->json([
            'message' => 'Job offer created successfully!',
            'job_offer' => $jobOffer
        ], 201);
    }

    public function show($id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return response()->json(['message' => 'Job offer not found'], 404);
        }

        return response()->json($jobOffer);
    }

    public function update(Request $request, $id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return response()->json(['message' => 'Job offer not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'requirements' => 'nullable|string',
            'posting_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:50',
        ]);

        $jobOffer->update($validatedData);

        return response()->json([
            'message' => 'Job offer updated successfully!',
            'job_offer' => $jobOffer
        ]);
    }

    public function destroy($id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return response()->json(['message' => 'Job offer not found'], 404);
        }

        $jobOffer->delete();

        return response()->json([
            'message' => 'Job offer deleted successfully'
        ], 200);
    }
    
}
