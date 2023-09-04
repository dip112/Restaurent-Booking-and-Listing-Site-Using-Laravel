<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class customAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        $pattern1 = '/^book\/[0-9]+$/';
        $pattern2 = '/^delete\/[0-9]+$/';
        if(($path=='login' || $path=='register') && Session::get('user')){
            return redirect('/');
        }
        else if(($path!='login' && !Session::get('user')) && ($path!='register' && !Session::get('user')) && ($path!='forget_password' && !Session::get('user')) && ($path!='update_password' && !Session::get('user'))){
            return redirect('login');
        }
        else if(Session::get('user') && Session::get('user')['user_type']=='Customer' && ($path!='/' && $path!='lists' && $path!='booking_list' && $path!='logout' && $path!='book' && !preg_match($pattern1, $path) && !preg_match($pattern2, $path))){
            return redirect('/');
        }
        return $next($request);
    }
}
