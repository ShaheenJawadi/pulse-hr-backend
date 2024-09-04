<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanbanTask extends Model
{
    use HasFactory;
    protected $fillable = ['column_id', 'title', 'displayOrder', 'assigned_by', 'assigned_to'];

    public function column()
    {
        return $this->belongsTo(KanbanColumn::class, 'column_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(Employee::class, 'assigned_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }

    public function tags()
    {
        return $this->belongsToMany(KanbanTags::class, 'kanban_task_tag');
    }


     /**
     * Get the tags  
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTagsAttribute()
    {
        return $this->tags()->get();
    }
}
