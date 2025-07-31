<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
       if (!auth()->check()) {
    abort(403, 'Not Authenticated');
}

$actualRole = auth()->user()->role;

if (!in_array($actualRole, $roles)) {
    abort(403, 'Unauthorized. Your role: ' . $actualRole);
}

        return $next($request);
    }
}
