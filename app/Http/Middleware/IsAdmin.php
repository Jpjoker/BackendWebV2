<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and an admin
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Optionally, you can redirect non-admins or show an error message
        return redirect('/')->with('error', 'You do not have permission to perform this action.');
    }
}


