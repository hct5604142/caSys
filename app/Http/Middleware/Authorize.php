<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Route;

class Authorize
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
        //获取路由名称
        $routeName=Route::currentRouteName();
        //获取方法
        $method=$request->getMethod();
        //获取PerssionIDs并格式化
        if(Permission::where('name',$routeName)->exists()){
            $sessionRolesIds=explode(',',session()->get('permission'));
            array_pop($sessionRolesIds);
            foreach ($sessionRolesIds as $pid){
                if(Permission::where('id',$pid)->where('name',$routeName)->where('method',$method)->exists()){
                    return $next($request);
                }
            }
        }else{
            return $next($request);
        }

        return redirect('/no_right');
       // return $next($request);
    }
}
