<?php

namespace App\Http\Middleware;

use Closure;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $loggedUser = \Auth::user();

        if ($loggedUser->role != $role)
        {
            return redirect()->route('gta');
        }

        return $next($request);
    }
}
