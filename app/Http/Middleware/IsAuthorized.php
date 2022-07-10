<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {

        if(Auth::check()){

            foreach($roles as $role){
                
                if(Auth::user()->user->rol === $role){
                    return $next($request);
                }
            }
            return abort(403, 'Unauthorized action.');

        }else{
            return redirect()->route('login');
        }
        
    }
}
