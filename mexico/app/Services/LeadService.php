<?php

namespace App\Services;

use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Log;

class LeadService
{
    /**
     * Store a new form submission lead
     */
    public function storeLead(array $data, ?string $ip = null): ?FormSubmission
    {
        // 1. Check for honeypot
        if (!empty($data['_honeypot'])) {
            // Silently ignore spam submission
            Log::info('Spam form submission detected and silently ignored.', [
                'email' => $data['email'] ?? 'unknown',
                'ip' => $ip,
                'form_id' => $data['form_id'] ?? 'unknown',
            ]);
            return null; // Return null to indicate no record was saved, but controller will return 200 OK
        }

        // 2. Remove honeypot field
        unset($data['_honeypot']);

        // 3. Add IP Hash
        if ($ip) {
            $data['ip_hash'] = hash('sha256', $ip);
        }

        // 4. Default status for new leads
        $data['status'] = 'new';

        // 5. Store lead
        return FormSubmission::create($data);
    }

    /**
     * Advance pipeline status
     */
    public function updateStatus(FormSubmission $lead, string $newStatus): FormSubmission
    {
        $validStatuses = [
            'new', 'assigned', 'contacted', 'qualified', 
            'proposal', 'won', 'lost', 'discarded'
        ];

        if (!in_array($newStatus, $validStatuses)) {
            throw new \InvalidArgumentException("Estado de lead inválido: $newStatus");
        }

        $lead->update(['status' => $newStatus]);
        return $lead;
    }
}
