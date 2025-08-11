<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIpMiddleware
{
    /**
     * List IP yang diizinkan
     */
    protected $allowedIps = [
        '127.0.0.1'
    ];

    /**
     * Handle incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->ip(), $this->allowedIps)) {
            abort(403, 'Access denied: your IP is not allowed.');
        }

        return $next($request);
    }
}
