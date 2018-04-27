<?php
use Symfony\Component\HttpKernel\Exception\HttpException;
namespace App\Http\Middleware;

use Closure;

class DownForMaintenance
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
        abort(503);
    }
}
