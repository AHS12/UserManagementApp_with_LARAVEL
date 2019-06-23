<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if ($request->user() === null) {
            # code...
            return response("You Dont Have Permission To View This Page",401);
        }

        if($request->user()->hasRole('administrator')){
            return $next($request);
        }

        return redirect()->route('forbidden');


    }
}
