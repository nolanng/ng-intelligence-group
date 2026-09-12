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
     * Handle the login event.
     */
    public function handleLogin(Login $event): void
    {
        $this->logEvent($event->user, 'LOGIN');
    }

    /**
     * Handle the logout event.
     */
    public function handleLogout(Logout $event): void
    {
        $this->logEvent($event->user, 'LOGOUT');
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
