<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('public.login');
        }

        $user = Auth::user();
        
        // Admin can access everything
        if ($user->isAdmin()) {
            return $next($request);
        }
        
        // Staff can only access specific resources
        if ($user->isStaff()) {
            $allowedRoutes = [
                'users.index', 'users.create', 'users.store', 'users.edit', 
                'users.update', 'users.destroy', 'users.show',
                'kampus.index', 'kampus.create', 'kampus.store', 'kampus.edit', 
                'kampus.update', 'kampus.destroy',
                'dashboard'
            ];
            
            if (in_array($request->route()->getName(), $allowedRoutes)) {
                return $next($request);
            }
        }
        
        abort(403, 'Unauthorized access');
    }
}
