<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'super-admin' && auth()->user()->role_id != 1) {
            abort(403);
        }

        if ($role == 'admin' && auth()->user()->role_id != 2) {
            abort(403);
        }

        if ($role == 'vermieter' && auth()->user()->role_id != 3) {
            abort(403);
        }

        return $next($request);
    }
}