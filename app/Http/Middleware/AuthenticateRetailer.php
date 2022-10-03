<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateRetailer extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) 
        {
            // Return to retailer.login route if retailer is not authenticated
            return route('retailer.login');
        }
    }
    protected function authenticate($request, array $guards)
    {
    // For retailer middleware will check retailer guard
            if ($this->auth->guard('retailer')->check()) {
                return $this->auth->shouldUse('retailer');
            }

        $this->unauthenticated($request,['retailer']);
    }
}
