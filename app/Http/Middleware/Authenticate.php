<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

// namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use  Illuminate\Support\Facades\Redirect;

// class Authenticate extends Middleware
class Authenticate
{
    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return string|null
    //  */
    // protected function redirectTo($request)
    // {
    //     if(Auth::check()){
    //         return $next($request);

    //    }else{
    //        echo "Login Page";
    //     //    return redirect()->route('programs');
    //    }
       
    // }

    public function handle($request, Closure $next)
    {
           if(Auth::check()){
            return $next($request);

       }else{
          
            return redirect()->route('adminLogin');
       }
    }


}
