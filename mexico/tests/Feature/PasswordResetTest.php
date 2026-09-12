<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_reset_flow()
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'reset@example.com',
            'password' => Hash::make('oldpassword123'),
        ]);

        // Request reset link
        $response = $this->post('/forgot-password', [
            'email' => 'reset@example.com',
        ]);

        $response->assertSessionHas('status');

        $this->assertDatabaseHas('password_reset_tokens', [
            'email' => 'reset@example.com',
        ]);

        // Ensure token works for reset
        $token = Password::createToken($user);

        // Test weak password rejection (should fail min:12 and symbols rules)
        $weakResponse = $this->post('/reset-password', [
            'token' => $token,
            'email' => 'reset@example.com',
            'password' => 'weakpass',
            'password_confirmation' => 'weakpass',
        ]);

        $weakResponse->assertSessionHasErrors('password');

        // Test valid password acceptance
        $newPassword = 'NewStrongPassword123!@#';

        $validResponse = $this->post('/reset-password', [
            'token' => $token,
            'email' => 'reset@example.com',
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $validResponse->assertRedirect('/login');

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }
}
