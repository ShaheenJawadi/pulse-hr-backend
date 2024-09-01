<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;


class CandidateSeeder extends Seeder
{
    public function run()
    {
        Candidate::create([
            'full_name' => 'Shaheen jawadi',
            'email' => 'contact@shaheenj.com',
            'phone' => '1234567890',
            'actual_position' => 'Software Developer',
            'linkedin_profile' => '',
            'github_profile' => 'https://github.com/ShaheenJawadi',
            'motivation' => 'Passionate about coding.',
            'birthday' => '1998-01-01',
            'resume_path' => '',
            'status' => 'Applied',
            'submitted_at' => now(),
            'last_status_change' => now(),
            'job_offer_id' => 1,  
        ]);
    }
}