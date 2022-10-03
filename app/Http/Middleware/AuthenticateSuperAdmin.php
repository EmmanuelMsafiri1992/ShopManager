<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateSuperAdmin extends Middleware
{
protected function redirectTo($request)
{
if (! $request->expectsJson()) 
{
// Return to login route if superadmin is not authenticated
return route('login');
}
}
protected function authenticate($request, array $guards)
{
// For superadmin middleware will check superadmin guard
if ($this->auth->guard('superadmin')->check()) {
return $this->auth->shouldUse('superadmin');
}

$this->unauthenticated($request,['superadmin']);
}
}
