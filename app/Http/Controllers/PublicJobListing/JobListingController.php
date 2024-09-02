<?php

namespace App\Http\Controllers\PublicJobListing;
use App\Http\Controllers\Controller; 
use App\Models\JobOffer;


use App\Models\Candidate;
use App\Utils\ApiResponse;

use Illuminate\Http\Request;

class JobListingController extends Controller
{
 
    public function apply(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'actual_position' => 'nullable|string|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'github_profile' => 'nullable|url|max:255',
            'motivation' => 'nullable|string',
            'birthday' => 'nullable|date',
            'resume_path' => 'nullable|string|max:255',
         
            'job_offer_id' => 'required|exists:job_offers,id',
        ]);
     
        $validatedData['submitted_at'] = now();
        $validatedData['status'] = 'pending';
        $validatedData['last_status_change'] = now();
        $validatedData['resume_path'] = "todo";


        
     
        $candidate = Candidate::create($validatedData);
     
        return ApiResponse::success($candidate, 'Candidate application submitted successfully!');
    }




    
    public function index()
    {
        $jobOffers = JobOffer::all();
        return ApiResponse::success($jobOffers, 'success ');
    }


 
}
