<?php

namespace App\Http\Middleware;

use Closure;

class SetUserIdMiddleware
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
        //vrlo bitno i vrlo korisno!
        //svaki put imas user_id (admin_id u ovom slucaju) u requestu, da g ane bi vadio iz samog requesta svaki put
        if(empty(request('admin_id'))) {
            request()->merge(['admin_id' => request()->user()->id]);
        }

        return $next($request);
    }
}
