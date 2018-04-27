<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \Illuminate\Support\Facades\Session;
class IsAdmin
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
        //$this->middleware('auth');
        //$this->user = \Auth::user();
        //dd($this->user);
        //dd(Auth::user());
        if (Session::get('usernm') == null)
        {
            return redirect('admin');
        }
        return $next($request);
    }

}
