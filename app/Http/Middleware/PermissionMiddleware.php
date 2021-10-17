<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Endpoint;
use App\Permission;
use App\User;

class PermissionMiddleware
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
        $endpoint = Endpoint::where(["name"=>Route::currentRouteName()])->first();

        //* The endpoint has permission?
        if(is_null($endpoint->permission_id)) 
            return $next($request);
        
        $permission = Permission::find($endpoint->permission_id);

        if(is_null($permission)) 
            return $next($request);

        foreach ($request->user()->roles as $role){
            $permissions_role = $role->permissions;
            foreach ($permissions_role as $p){
                if($p->id ==$permission->id ){
                    return $next($request);
                }
            }
        }
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}
