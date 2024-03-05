<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('login');
        }

        //admin
        $user=Auth::user();
        if($user->role==2){
            return redirect('/admin');
        }

        //editor
        if($user->role==1){
            return redirect('/editor');
        }

        //user
        if($user->role==0){
            return $next($request);
        }
    }
}
