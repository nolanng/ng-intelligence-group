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
            
            ['name' => 'View Contents', 'slug' => 'contents.view', 'module' => 'contents', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Create Contents', 'slug' => 'contents.create', 'module' => 'contents', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edit Contents', 'slug' => 'contents.edit', 'module' => 'contents', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Publish Contents', 'slug' => 'contents.publish', 'module' => 'contents', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delete Contents', 'slug' => 'contents.delete', 'module' => 'contents', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('permissions')->insertOrIgnore($permissions);

        // 2. Fetch role and permission IDs
        $superAdmin = DB::table('roles')->where('slug', 'superadmin')->first();
        $admin = DB::table('roles')->where('slug', 'administrador')->first();
        $editor = DB::table('roles')->where('slug', 'editor')->first();
        $marketing = DB::table('roles')->where('slug', 'marketing')->first();

        // Map permission slugs to IDs
        $permissionsMap = DB::table('permissions')->pluck('id', 'slug')->toArray();

        // 3. Associate explicitly
        $pivotData = [];

        // SuperAdmin: all
        if ($superAdmin) {
            $superAdminPerms = ['users.view', 'users.create', 'users.edit', 'users.delete', 'contents.view', 'contents.create', 'contents.edit', 'contents.publish', 'contents.delete'];
            foreach ($superAdminPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $superAdmin->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }

        // Administrador: users.view, contents.view, contents.create, contents.edit, contents.publish
        if ($admin) {
            $adminPerms = ['users.view', 'contents.view', 'contents.create', 'contents.edit', 'contents.publish'];
            foreach ($adminPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $admin->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }
        
        // Editor: contents.view, contents.create, contents.edit
        if ($editor) {
            $editorPerms = ['contents.view', 'contents.create', 'contents.edit'];
            foreach ($editorPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $editor->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }

        // Marketing: contents.view, contents.create, contents.edit
        if ($marketing) {
            $marketingPerms = ['contents.view', 'contents.create', 'contents.edit'];
            foreach ($marketingPerms as $slug) {
                if (isset($permissionsMap[$slug])) {
                    $pivotData[] = ['role_id' => $marketing->id, 'permission_id' => $permissionsMap[$slug]];
                }
            }
        }

        DB::table('permission_role')->insertOrIgnore($pivotData);
    }
}
