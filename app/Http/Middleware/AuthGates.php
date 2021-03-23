<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $roles =  Role::with('permissions')->get();
            $permissions = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions[$permission->name][] = $permission->id;
                }
            }

            foreach ($permissions as $permissionName => $roles) {
                Gate::define($permissionName, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
