<?php

namespace App\Http\Middleware;

use Closure;

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
        $user = Auth::user();
        dd($user);
        if ($user->admin == 1) {
            return response(json_encode(['error' => 'Unauthorised']), 401)
                ->header('Content-Type', 'text/json');
        }
        return $next($request);
    }
}
