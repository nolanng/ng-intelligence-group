<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_credentials_creates_session_and_audit_log()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'event' => 'LOGIN',
            'auditable_type' => User::class,
        ]);
    }

    public function test_login_with_invalid_credentials_shows_error()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
        
        $this->assertDatabaseMissing('audit_logs', [
            'user_id' => $user->id,
            'event' => 'LOGIN',
        ]);
    }

    public function test_logout_destroys_session_and_creates_audit_log()
    {
        $user = User::factory()->create();
        
        $this->actingAs($user);
        
        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'event' => 'LOGOUT',
            'auditable_type' => User::class,
        ]);
    }

    public function test_rate_limiting_blocks_eleventh_login_attempt()
    {
        $user = User::factory()->create([
            'email' => 'rate@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Attempt 10 failed logins
        for ($i = 0; $i < 10; $i++) {
            $this->postJson('/login', [
                'email' => 'rate@example.com',
                'password' => 'wrongpassword',
            ]);
        }

        // 11th attempt
        $response = $this->postJson('/login', [
            'email' => 'rate@example.com',
            'password' => 'wrongpassword',
        ]);
        
        $response->assertStatus(429);
    }

    public function test_protected_route_without_session_redirects_to_login()
    {
        $response = $this->get('/dashboard');
        
        $response->assertRedirect('/login');
    }

    public function test_suspended_user_cannot_login()
    {
        $user = User::factory()->create([
            'email' => 'suspended@example.com',
            'password' => Hash::make('password123'),
            'status' => 'suspended',
        ]);

        $response = $this->post('/login', [
            'email' => 'suspended@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.'
        ]);
        $this->assertGuest();
    }

    public function test_successful_login_updates_last_login_fields()
    {
        $user = User::factory()->create([
            'email' => 'update@example.com',
            'password' => Hash::make('password123'),
            'last_login_at' => null,
            'last_login_ip' => null,
        ]);

        $this->post('/login', [
            'email' => 'update@example.com',
            'password' => 'password123',
        ]);

        $user->refresh();

        $this->assertNotNull($user->last_login_at);
        $this->assertNotNull($user->last_login_ip);
    }
}
