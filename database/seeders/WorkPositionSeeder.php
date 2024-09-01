<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkPosition;

class WorkPositionSeeder extends Seeder
{
    public function run()
    {
        WorkPosition::create([
            'designation' => 'Software Engineer',
        ]);
    }
}
