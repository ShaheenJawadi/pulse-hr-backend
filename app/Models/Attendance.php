<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id', 'date', 'clock_in_time', 'clock_out_time', 'expected_clock_in_time', 
        'expected_clock_out_time', 'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
