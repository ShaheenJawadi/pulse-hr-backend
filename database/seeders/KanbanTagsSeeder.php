<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KanbanTags;
class KanbanTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['title' => 'High Priority', 'color' => 'error'],
            ['title' => 'Medium Priority', 'color' => 'warning'],
            ['title' => 'Low Priority', 'color' => 'info'],
            ['title' => 'Feature', 'color' => 'primary'],
            ['title' => 'Bug', 'color' => 'secondary'],
            ['title' => 'Improvement', 'color' => 'success'],
        ];

        KanbanTags::insert($tags);
    }
}
