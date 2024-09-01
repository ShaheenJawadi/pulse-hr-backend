<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkContractType;

class WorkContractTypeSeeder extends Seeder
{
    public function run()
    {
        WorkContractType::create([
            'designation' => 'Full-time',
        ]);
    }
}
