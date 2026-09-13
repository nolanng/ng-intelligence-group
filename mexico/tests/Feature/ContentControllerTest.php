<?php

namespace Tests\Feature;

use App\Enums\ContentStatus;
use App\Enums\ContentType;
use App\Models\Content;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed'); // to get roles and permissions
    }

    public function test_unauthenticated_user_is_redirected()
    {
        $response = $this->post('/contents', []);
        $response->assertRedirect('/login'); // Expecting redirect to login
    }

    public function test_editor_can_view_single_content()
    {
        $editorRole = Role::where('slug', 'editor')->first();
        $editor = User::factory()->create();
        $editor->roles()->attach($editorRole);

        $content = Content::factory()->create();

        $response = $this->actingAs($editor)->getJson("/contents/{$content->id}");
        
        $response->assertStatus(200);
        $response->assertJsonPath('id', $content->id);
    }

    public function test_editor_can_create_content()
    {
        $editorRole = Role::where('slug', 'editor')->first();
        $editor = User::factory()->create();
        $editor->roles()->attach($editorRole);

        $response = $this->actingAs($editor)->postJson('/contents', [
            'content_type' => ContentType::PAGE->value,
            'title' => 'Test Page',
            'slug' => 'test-page',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('contents', [
            'title' => 'Test Page',
            'status' => ContentStatus::DRAFT->value,
            'author_id' => $editor->id,
        ]);
    }

    public function test_editor_cannot_publish_content()
    {
        $editorRole = Role::where('slug', 'editor')->first();
        $editor = User::factory()->create();
        $editor->roles()->attach($editorRole);

        $content = Content::factory()->create(['status' => ContentStatus::APPROVED]);

        $response = $this->actingAs($editor)->postJson("/contents/{$content->id}/publish");
        $response->assertStatus(403);
    }

    public function test_admin_can_publish_content()
    {
        $adminRole = Role::where('slug', 'administrador')->first();
        $admin = User::factory()->create();
        $admin->roles()->attach($adminRole);

        $content = Content::factory()->create(['status' => ContentStatus::APPROVED]);

        $response = $this->actingAs($admin)->postJson("/contents/{$content->id}/publish");
        $response->assertStatus(200);
        $this->assertEquals(ContentStatus::PUBLISHED, $content->fresh()->status);
    }
}
