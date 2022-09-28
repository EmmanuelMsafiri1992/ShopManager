<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateWholeseller extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) 
        {
            // Return to admin.login route if admin is not authenticated
            return route('wholeseller.login');
        }
    }
    protected function authenticate($request, array $guards)
    {
    // For wholeseller middleware will check wholeseller guard
            if ($this->auth->guard('wholeseller')->check()) {
                return $this->auth->shouldUse('wholeseller');
            }

        $this->unauthenticated($request,['wholeseller']);
    }
}
