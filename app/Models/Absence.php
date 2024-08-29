<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'start_date', 'end_date', 'type', 'status', 'reason',
    ];

   
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
