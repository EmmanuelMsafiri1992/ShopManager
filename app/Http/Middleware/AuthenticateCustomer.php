<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateCustomer extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) 
        {
            // Return to customer.login route if customer is not authenticated
            return route('customer.login');
        }
    }
    protected function authenticate($request, array $guards)
    {
    // For customer middleware will check customer guard
            if ($this->auth->guard('customer')->check()) {
                return $this->auth->shouldUse('customer');
            }

        $this->unauthenticated($request,['customer']);
    }
}
