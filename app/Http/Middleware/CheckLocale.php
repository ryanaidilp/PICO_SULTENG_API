<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
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
        if ($request->has('lang')) {
            app('translator')->setLocale($request->get('lang'));
        }
        return $next($request);
    }
}
