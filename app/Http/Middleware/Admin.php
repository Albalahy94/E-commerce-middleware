<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {

            if (Auth::user()->admin == 1) {
                // return back();
                return $next($request);
                // return redirect('admin/');
            }
        }
        // return back()->with('success', 'your request wait admin permission');
        // redirect('pending-members');
        return redirect('/');
    }
}