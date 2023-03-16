<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class SuperPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user && $user->super_permissions){
            return $next($request);        
        }
    
        // error_log('SuperPermissions middleware triggered.');
        // error_log('User: ' . ($user ? $user->id : 'guest'));

        return redirect('/')->with('message', __("You do not have the permission to access this page."));
    }
    


}
