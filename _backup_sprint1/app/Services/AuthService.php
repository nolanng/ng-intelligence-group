<?php

namespace App\Services;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Attempt to authenticate a user.
     *
     * @param array $credentials
     * @return bool
     */
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Update last login
            $user->last_login_at = now();
            $user->last_login_ip = request()->ip();
            $user->save();
            
            // Generate audit log for login
            $this->logEvent($user, 'LOGIN', 'App\Models\User', $user->id);

            return true;
        }

        return false;
    }

    /**
     * Log out the authenticated user.
     *
     * @return void
     */
    public function logout()
    {
        $user = Auth::user();
        
        if ($user) {
            $this->logEvent($user, 'LOGOUT', 'App\Models\User', $user->id);
            Auth::logout();
        }
    }

    /**
     * Log an authentication event.
     *
     * @param User $user
     * @param string $event
     * @param string $auditableType
     * @param int $auditableId
     * @return void
     */
    protected function logEvent(User $user, $event, $auditableType, $auditableId)
    {
        AuditLog::create([
            'user_id' => $user->id,
            'event' => $event,
            'auditable_type' => $auditableType,
            'auditable_id' => $auditableId,
            'route' => request()->path(),
            'method' => request()->method(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'created_at' => now(),
        ]);
    }
}
