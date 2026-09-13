<?php

namespace Tests\Feature;

use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LeadCaptureTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_submit_valid_lead()
    {
        $form = Form::create([
            'name' => 'Contacto',
            'slug' => 'contacto',
            'form_type' => 'contact',
            'success_message' => '¡Éxito!',
        ]);

        $payload = [
            'form_id' => $form->id,
            'name' => 'Juan Perez',
            'email' => 'juan@example.com',
            'consent_at' => now()->toDateTimeString(),
        ];

        $response = $this->postJson('/submissions', $payload);

        $response->assertStatus(200)
                 ->assertJson(['message' => '¡Éxito!']);

        $this->assertDatabaseHas('form_submissions', [
            'form_id' => $form->id,
            'name' => 'Juan Perez',
            'email' => 'juan@example.com',
            'status' => 'new',
        ]);
    }

    public function test_honeypot_submission_is_silently_ignored()
    {
        $form = Form::create([
            'name' => 'Contacto',
            'slug' => 'contacto',
            'form_type' => 'contact',
            'success_message' => '¡Éxito!',
        ]);

        $payload = [
            'form_id' => $form->id,
            'name' => 'Spam Bot',
            'email' => 'spam@bot.com',
            'consent_at' => now()->toDateTimeString(),
            '_honeypot' => 'soy_un_bot_y_lleno_campos_ocultos',
        ];

        $response = $this->postJson('/submissions', $payload);

        // Debe devolver 200 OK
        $response->assertStatus(200)
                 ->assertJson(['message' => '¡Éxito!']);

        // NO debe crearse en BD
        $this->assertDatabaseMissing('form_submissions', [
            'email' => 'spam@bot.com',
        ]);
    }
}
