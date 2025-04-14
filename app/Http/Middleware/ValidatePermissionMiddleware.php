<?php

namespace App\Http\Middleware;

use App\Classes\ApiResponseClass;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidatePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$requiredPermissions): Response
    {
        $user = Auth::user();

        if (!$user) {
            return ApiResponseClass::sendResponse(null, 'Unauthorized', 401);
        }

        $userPermissions = $user->permissions ?? collect();

        $profilePermissions = $user->profile?->permissions ?? collect();

        $allPermissions = $userPermissions
            ->merge($profilePermissions)
            ->map(fn($perm) => strtoupper($perm->name))
            ->unique();

        $hasPermission = collect($requiredPermissions)->some(
            fn($perm) =>
            $allPermissions->contains(strtoupper($perm))
        );

        if (!$hasPermission) {
            return ApiResponseClass::sendResponse(null, 'Invalid permission', 403);
        }

        return $next($request);
    }
}
