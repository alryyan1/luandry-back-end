<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class RefreshSanctumToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = $request->user();
            $token = $request->bearerToken();
            $accessToken = PersonalAccessToken::findToken($token);

            if ($accessToken) {
                // Refresh the token if it's close to expiring (e.g., within 5 minutes)
                if (now()->diffInMinutes($accessToken->expires_at) < 5) {
                    $accessToken->forceFill([
                        'expires_at' => now()->addMinutes(config('sanctum.expiration')),
                    ])->save();
                }
            }
        }
        return $next($request);
    }
}
