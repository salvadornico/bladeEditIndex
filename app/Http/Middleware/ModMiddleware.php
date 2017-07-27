<?php

namespace App\Http\Middleware;

use Closure;

class ModMiddleware
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
        if (!$request->user()) {
            return redirect("/login");
        } else if ($request->user()->role == "moderator" || $request->user()->role == "admin") {
            return $next($request);
        } else {
            return back();
        }
    }
}
