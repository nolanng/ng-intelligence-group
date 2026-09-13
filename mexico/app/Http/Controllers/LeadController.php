<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormSubmissionRequest;
use App\Models\Form;
use App\Services\LeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function __construct(private LeadService $leadService)
    {
    }

    /**
     * Public endpoint to submit a form / capture a lead
     */
    public function store(StoreFormSubmissionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $ip = $request->ip();

        $form = Form::findOrFail($data['form_id']);

        // Hand over to LeadService
        $this->leadService->storeLead($data, $ip);

        // Always return success (even for spam, which is ignored silently by LeadService)
        return response()->json([
            'message' => $form->success_message ?? 'Gracias por tu mensaje. Nos pondremos en contacto pronto.',
        ], 200);
    }
}
