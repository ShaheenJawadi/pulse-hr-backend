<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'requirements', 'posting_date', 'status',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
