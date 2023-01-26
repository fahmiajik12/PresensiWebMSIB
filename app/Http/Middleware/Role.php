<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//tambahan
use Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $peran)
    {
        //return $next($request);
       /* if (Auth::check() && Auth::user()->role == 'role') {
            return $next($request);
        }*/
       
    if (Auth::check()){
        $roles = explode('-','$peran');
        foreach ($roles as $group) {
           if (Auth::user()->role == $group){
            return $next($request);
           }  
        }
          return redirect('/access-denied');
      }
    }
}
