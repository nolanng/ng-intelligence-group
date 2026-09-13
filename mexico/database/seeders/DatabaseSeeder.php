<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        if (app()->environment('local', 'testing')) {
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
            
            $superAdminRole = \App\Models\Role::where('slug', 'superadmin')->first();
            if ($superAdminRole) {
                $user->roles()->attach($superAdminRole);
            }
        }

        $this->call([
            SolutionSeeder::class,
        ]);
    }
}
