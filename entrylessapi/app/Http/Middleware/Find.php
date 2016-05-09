<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Route;
use App\UserInfo;

use Closure;

class Find
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public $userinfo;
    
    public function __construct(Route $router){
        $this->userinfo = UserInfo::find($router->getParameter('users'));

    }

    public function handle($request, Closure $next)
    {   
        $user = $this->userinfo;
        $request->merge(compact('user'));   
        return $next($request);
    }
}

