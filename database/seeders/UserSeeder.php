<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ss',
            'email' => 'a@b.c',
            'role' => 'admin',
            'password' => Hash::make('testpassword'),
        ]);


        User::create([
            'name' => 'shaheen',
            'email' => 'contact@shaheenj.com',
            'role' => 'employee',
            'password' => Hash::make('testpassword'),
        ]);

        User::create([
            'name' => 'qsdsqdsqd',
            'email' => 'c@c.c',
            'role' => 'manager',
            'password' => Hash::make('testpassword'),
        ]);
    }
}
