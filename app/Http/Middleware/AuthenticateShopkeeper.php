<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateShopkeeper extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) 
        {
            // Return to shopkeeper.login route if shopkeeper is not authenticated
            return route('shopkeeper.login');
        }
    }
    protected function authenticate($request, array $guards)
    {
    // For shopkeeper middleware will check shopkeeper guard
            if ($this->auth->guard('shopkeeper')->check()) {
                return $this->auth->shouldUse('shopkeeper');
            }

        $this->unauthenticated($request,['shopkeeper']);
    }
}
