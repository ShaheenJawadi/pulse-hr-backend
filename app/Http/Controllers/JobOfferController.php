<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Utils\ApiResponse;

use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function index()
    {
        $jobOffers = JobOffer::all();
        return ApiResponse::success($jobOffers, 'success ');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'location' => 'required|string|max:255',
            'min_experience' => 'nullable|integer',
            'max_experience' => 'nullable|integer',
            'tags' => 'nullable|array',
            'short_description' => 'string',
            'requirements' => 'string',
            'expire_at' => 'nullable|string',
            'status' => 'required|string|in:open,closed',
        ]);
    
        $jobOffer = JobOffer::create($validatedData);
    
        return ApiResponse::success($jobOffer, 'Job offer created successfully!');
    }




    public function show($id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return ApiResponse::error('Job offer not found ');
        }
        return ApiResponse::success($jobOffer);
    }

    public function update(Request $request, $id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return ApiResponse::error('Job offer not found ');
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'requirements' => 'nullable|string',
            'posting_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:50',
        ]);

        $jobOffer->update($validatedData);


        return ApiResponse::success($jobOffer, 'Job offer updated successfully!');
    }

    public function destroy($id)
    {
        $jobOffer = JobOffer::find($id);

        if (!$jobOffer) {
            return ApiResponse::error('Job offer not found ');
        }

        $jobOffer->delete();



        return ApiResponse::success($jobOffer, 'Job offer deleted successfully!');
    }
}
