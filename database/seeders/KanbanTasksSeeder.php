<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KanbanTask;
use Illuminate\Support\Facades\DB;
class KanbanTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['column_id' => 1, 'title' => 'Task 1', 'displayOrder' => 1, 'assigned_by' => 2, 'assigned_to' => 7],
            ['column_id' => 1, 'title' => 'Task 2', 'displayOrder' => 2, 'assigned_by' => 3, 'assigned_to' => 8],
            ['column_id' => 2, 'title' => 'Task 3', 'displayOrder' => 1, 'assigned_by' => 2, 'assigned_to' => 8],
            ['column_id' => 3, 'title' => 'Task 4', 'displayOrder' => 2, 'assigned_by' => 3, 'assigned_to' => 8],
        ];

        KanbanTask::insert($tasks);
 
        $taskTags = [
            ['kanban_task_id' => 1, 'kanban_tag_id' => 1],
            ['kanban_task_id' => 1, 'kanban_tag_id' => 2],
            ['kanban_task_id' => 2, 'kanban_tag_id' => 2],
            ['kanban_task_id' => 3, 'kanban_tag_id' => 3],
            ['kanban_task_id' => 4, 'kanban_tag_id' => 4],
        ];

        DB::table('kanban_task_tag')->insert($taskTags);
    }
}
