<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'department_id', 'location', 'min_experience', 'max_experience', 'tags', 
        'short_description', 'requirements', 'expire_at', 'status','contract_type_id'
    ];

    protected $casts = [
        'tags' => 'array',  
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'job_offer_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function contractType()
    {
        return $this->belongsTo(WorkContractType::class);
    }
}
