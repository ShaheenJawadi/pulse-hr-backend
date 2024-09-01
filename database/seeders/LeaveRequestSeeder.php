<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveRequest;

class LeaveRequestSeeder extends Seeder
{
    public function run()
    {
        LeaveRequest::create([
            'employee_id' => 3, 
            'start_date' => now()->addDays(1),
            'end_date' => now()->addDays(5),
            'leave_type' => 'Vacation',
            'comments' => 'Family vacation',
            'status' => 'Approved',
            'manager_comments' => 'Enjoy your vacation!',
        ]);
    }
}
