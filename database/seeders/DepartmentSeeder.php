<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'name' => 'Engineering',
            'location' => 'sfax ',
            'manager_id' => null,  
        ]);
        Department::create([
            'name' => 'Engineering',
            'location' => 'tunis ',
            'manager_id' => null,  
        ]);
    }
}
