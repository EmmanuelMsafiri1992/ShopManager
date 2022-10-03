<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateAdmin extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) 
        {
            // Return to admin.login route if admin is not authenticated
            return route('admin.login');
        }
    }
    protected function authenticate($request, array $guards)
    {
    // For admin middleware will check admin guard
            if ($this->auth->guard('admin')->check()) {
                return $this->auth->shouldUse('admin');
            }

        $this->unauthenticated($request,['admin']);
    }
}
