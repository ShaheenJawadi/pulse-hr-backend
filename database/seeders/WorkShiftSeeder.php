<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkShift;

class WorkShiftSeeder extends Seeder
{
    public function run()
    {
        WorkShift::create([
            'designation' => 'oiazdoiazd azudioazuio',
            'content' => 'qsdsqsdqs',
        ]);
    }
}
