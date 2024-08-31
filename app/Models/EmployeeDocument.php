<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EmployeeDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'document_type', 'document_path', 'uploaded_at',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class , 'employee_id');
    }

}
