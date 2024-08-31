<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'actual_position', 'linkedin_profile', 'github_profile', 'motivation',
        'birthday', 'resume_path', 'status', 'submitted_at', 'last_status_change', 'job_offer_id'
    ];

    public function jobOffer(): BelongsTo
    {
        return $this->belongsTo(JobOffer::class);
    }
}
