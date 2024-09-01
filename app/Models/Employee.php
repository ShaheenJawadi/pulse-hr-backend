<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'birthday',
        'sexe',
        'avatar',
        'hire_date',
        'end_contract',
        'contract_type_id',
        'department_id',
        'shift_id',
        'supervisor_id',
        'position_id',
        'additional_infos',
        'user_id'
    ];
    protected $casts = [
        'additional_infos' => 'array',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(WorkPosition::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(WorkShift::class);
    }

    public function contractType(): BelongsTo
    {
        return $this->belongsTo(WorkContractType::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(EmployeeDocument::class);
    }

    public function performanceReviews(): HasMany
    {
        return $this->hasMany(PerformanceReview::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function assignedTasks(): HasMany
    {
        return $this->hasMany(KanbanTask::class, 'assigned_to');
    }

    public function tasksAssignedBy(): HasMany
    {
        return $this->hasMany(KanbanTask::class, 'assigned_by');
    }
}
