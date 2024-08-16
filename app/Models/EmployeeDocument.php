<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'document_type', 'document_path', 'uploaded_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
