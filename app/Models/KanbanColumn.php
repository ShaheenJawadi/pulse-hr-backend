<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanbanColumn extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function tasks() 
    {
        return $this->hasMany(KanbanTask::class, 'column_id');
    }
}
