<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }
    
        return redirect('/');
    }



    public function handles(Request $request, Closure $next)
    {
        
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        
        return redirect('/')->with('error', 'You do not have permission to perform this action.');
    }




    

}


