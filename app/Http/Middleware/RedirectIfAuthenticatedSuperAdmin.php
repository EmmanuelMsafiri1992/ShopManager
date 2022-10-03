<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticatedSuperAdmin
{
public function handle(Request $request, Closure $next)
{
// If superadmin is authenticated then redirect him to superadmin dashboard
if (Auth::guard('superadmin')->check()) {
return redirect()->route('superadmin.dashboard');
}
return $next($request);    }
}
