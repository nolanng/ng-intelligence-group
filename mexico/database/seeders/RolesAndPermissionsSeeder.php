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
            ['name' => 'View Users', 'slug' => 'view-users', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Users', 'slug' => 'create-users', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Users', 'slug' => 'edit-users', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Users', 'slug' => 'delete-users', 'module' => 'users', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('permissions')->insertOrIgnore($permissions);

        // 2. Fetch role and permission IDs
        $superAdmin = DB::table('roles')->where('slug', 'superadmin')->first();
        $admin = DB::table('roles')->where('slug', 'administrador')->first();

        $allPermissions = DB::table('permissions')->pluck('id');

        // 3. Associate all permissions to SuperAdmin and Administrador
        $pivotData = [];
        foreach ($allPermissions as $permId) {
            if ($superAdmin) {
                $pivotData[] = ['role_id' => $superAdmin->id, 'permission_id' => $permId];
            }
            if ($admin) {
                $pivotData[] = ['role_id' => $admin->id, 'permission_id' => $permId];
            }
        }

        DB::table('permission_role')->insertOrIgnore($pivotData);
    }
}
