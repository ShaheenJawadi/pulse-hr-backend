<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
      'employee_id',  'user_id', 'job_offer_id', 'resume_path', 'status', 'submitted_at', 'last_status_change',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
