<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

   protected $primaryKey = 'id';

   public $incrementing = true;

   protected $keyType = 'int';

    protected $fillable = [
        'user_id', 'hire_date', 'contract_type', 'department_id', 'position',
    ];

   
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function managedDepartment()
    {
        return $this->hasOne(Department::class, 'manager_id', 'id');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'employee_id', 'id');
    }

    public function performanceReviews()
    {
        return $this->hasMany(PerformanceReview::class, 'employee_id', 'id');
    }

   
    public function employeeDocuments()
    {
        return $this->hasMany(EmployeeDocument::class, 'employee_id', 'id');
    }
    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'employee_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
