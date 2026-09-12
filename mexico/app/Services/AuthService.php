<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Handle the login process.
     *
     * @param LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = Auth::user();

        if ($user && $user->status !== 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'Estas credenciales no coinciden con nuestros registros.',
            ]);
        }

        if ($user) {
            $user->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
            ]);
        }
    }

    /**
     * Log out the authenticated user.
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }
}
