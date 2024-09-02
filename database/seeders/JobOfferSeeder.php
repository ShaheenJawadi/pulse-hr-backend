<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobOffer;

class JobOfferSeeder extends Seeder
{
    public function run()
    {
        JobOffer::create([
            'title' => 'Senior Developer',
            'slug' => 'senior-developer',
            'department_id' => 2, 
            'location' => 'Remote',
            'min_experience' => 5,
            'max_experience' => 10,
            'tags' => ['development', 'software'],
            'short_description' => 'shortsquhdi ysqdkhqskljd hsqkljdh qkjsdhqjs',
            'requirements' => 'jhsqgd jqgsjdh qgsjdhg qshdguqsdygqsjdhqsdqsdqsd',
            'expire_at' => now()->addDays(30),
            'status' => 'Open',
            'contract_type_id' => 1,  
        ]);
    }
}
