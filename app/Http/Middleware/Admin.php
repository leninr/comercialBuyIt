<?php

namespace comercialBuyIt\Http\Middleware;

use Closure;
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
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && $request->user()->isAdmin != '1' )
        {
            return redirect('/');
        }
        else if ( !Auth::check() ) {

            return redirect('login');
        }
        else {
            return $next($request);
        }
    }
}
