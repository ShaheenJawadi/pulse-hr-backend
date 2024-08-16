<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_id', 'report_path', 'created_at',
    ];

    public function performanceReview()
    {
        return $this->belongsTo(PerformanceReview::class, 'review_id');
    }
}
