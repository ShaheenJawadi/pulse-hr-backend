<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'name' => 'shaheen',
            'last_name' => 'jawadi',
            'email' => 'jawadishaheen@gmail.com',
            'phone' => '52723344',
            'birthday' => '1998-05-05',
            'sexe' => 'h',
            'avatar' => '',
            'hire_date' => now(),
            'end_contract' => null,
            'contract_type_id' => 1, 
            'department_id' => 2, 
            'shift_id' => 1, 
            'supervisor_id' => null,
            'position_id' => 1, 
            'additional_infos' => [],
            'user_id' => 2, 
        ]);
    }
}
