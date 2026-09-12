<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'SuperAdmin', 'slug' => 'superadmin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Administrador', 'slug' => 'administrador', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Editor', 'slug' => 'editor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marketing', 'slug' => 'marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comercial', 'slug' => 'comercial', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Auditor', 'slug' => 'auditor', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insertOrIgnore($roles);
    }
}
