<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    { 
        $this->call([
            UserSeeder::class,
            WorkContractTypeSeeder::class,
            WorkPositionSeeder::class,
            WorkShiftSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            JobOfferSeeder::class,
            CandidateSeeder::class,
            LeaveRequestSeeder::class, 
            KanbanTagsSeeder::class,
        ]);
    }
}
