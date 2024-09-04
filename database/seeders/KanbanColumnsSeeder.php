<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KanbanColumn;

class KanbanColumnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $columns = [
            ['title' => 'À Faire'],
            ['title' => 'En Cours'],
            ['title' => 'En Révision'],
            ['title' => 'Terminé'],
        ];

        KanbanColumn::insert($columns);
    }
}
