<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
{
    if (! Auth::user() || ! Auth::user()->hasPermission($permission)) {
        // If the user is not authenticated or does not have the required permission,
        // abort the request and redirect them to a 403 error page.
        abort(403);
    }

    // If the user is authenticated and has the required permission,
    // allow the request to proceed.
    return $next($request);
}
}
