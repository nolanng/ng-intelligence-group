<?php

namespace App\Listeners;

use App\Models\AuditLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class AuthAuditListener
{
    protected $request;

    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if ($event instanceof Login) {
            $this->logEvent($event->user, 'LOGIN');
        } elseif ($event instanceof Logout) {
            $this->logEvent($event->user, 'LOGOUT');
        }
    }

    /**
     * Log the event.
     */
    protected function logEvent($user, $eventType): void
    {
        if (!$user) {
            return;
        }

        AuditLog::create([
            'user_id' => $user->id,
            'event' => $eventType,
            'auditable_type' => get_class($user),
            'auditable_id' => $user->id,
            'route' => $this->request->path(),
            'method' => $this->request->method(),
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
            'created_at' => now(),
        ]);
    }
}
