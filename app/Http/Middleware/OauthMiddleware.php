<?php

namespace SimulatorOperation\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Closure;
use Session;

class OauthMiddleware   
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('api_token')){
            return $next($request);
        }
        
        $route = Route::currentRouteName();
        return redirect()->route('login');

    }
}
