<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);
    }

    public function test_editor_cannot_manage_users()
    {
        $editorRole = Role::where('slug', 'editor')->first();
        $this->assertNotNull($editorRole, 'Editor role should exist in database.');

        $editor = User::factory()->create();
        $editor->roles()->attach($editorRole->id);

        // Test the UserPolicy directly
        $this->assertFalse($editor->can('viewAny', User::class));
    }
}
