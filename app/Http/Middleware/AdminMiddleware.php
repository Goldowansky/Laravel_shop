<?php

namespace App\Http\Middleware;

use App\Models\Enums\RoleName;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && (auth()->user()->hasRole(RoleName::Administrator) || auth()->user()->hasRole(RoleName::Moderator))) {
            return $next($request);
            // return redirect('/');
        }
        // return $next($request);
        return redirect()->route('index.')->withErrors(['privileges' => 'Not enough privileges']);
    }
}