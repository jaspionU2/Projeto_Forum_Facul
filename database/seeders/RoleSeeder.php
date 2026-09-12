<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Global Admin', 'description' => 'Full system access', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Community Moderator', 'description' => 'Moderates a specific community', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Student', 'description' => 'Standard user', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
