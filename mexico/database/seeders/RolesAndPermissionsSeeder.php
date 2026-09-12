<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert granular permissions
        $permissions = [
            ['name' => 'View Users', 'slug' => 'users.view', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Users', 'slug' => 'users.create', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Users', 'slug' => 'users.edit', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Users', 'slug' => 'users.delete', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('permissions')->insertOrIgnore($permissions);

        // 2. Fetch role and permission IDs
        $superAdmin = DB::table('roles')->where('slug', 'superadmin')->first();
        $admin = DB::table('roles')->where('slug', 'administrador')->first();

        // Map permission slugs to IDs
        $permissionsMap = DB::table('permissions')->pluck('id', 'slug')->toArray();

        // 3. Associate explicitly
        $pivotData = [];

        // SuperAdmin: users.view, users.create, users.edit, users.delete
        if ($superAdmin) {
            $superAdminPerms = ['users.view', 'users.create', 'users.edit', 'users.delete'];
            foreach ($superAdminPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $superAdmin->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }

        // Administrador: users.view
        if ($admin) {
            $adminPerms = ['users.view'];
            foreach ($adminPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $admin->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }

        DB::table('permission_role')->insertOrIgnore($pivotData);
    }
}
