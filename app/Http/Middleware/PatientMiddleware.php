<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PatientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('user_type') !== 'patient') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}