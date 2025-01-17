<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleMiddleware
 *
 * Ensures that the authenticated user has the required role to access a route.
 */
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Verifies if the authenticated user has the required role. If not, it aborts with a 403 status.
     *
     * @param \Illuminate\Http\Request $request The current HTTP request.
     * @param \Closure $next The next middleware to handle the request.
     * @param string $role The required role for the route.
     * @return mixed The next request handler or a 403 response if the user is unauthorized.
     */
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the specified role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Abort with a 403 Forbidden response if the user is unauthorized
        abort(403, 'Unauthorized action.');
    }
}
