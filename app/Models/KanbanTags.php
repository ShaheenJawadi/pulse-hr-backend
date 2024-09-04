<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 

class KanbanTags extends Model
{
    protected $fillable = ['title', 'color'];

    public function tasks()
    {
        return $this->belongsToMany(KanbanTask::class, 'kanban_task_tag');
    }
}
