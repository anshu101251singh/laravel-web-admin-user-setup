<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd($request->input('user_type'));
        if(!Auth::check()){
            return redirect()->route('user.login')->with('error','You must be login to access this page');
        }

        if (Auth::user()->user_type == 1) {
            return redirect()->route('user.login')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
