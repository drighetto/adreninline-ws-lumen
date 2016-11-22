<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware
{
    protected $headers = [
    'Access-Control-Allow-Origin' => '*',
    'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
    'Access-Control-Allow-Headers' => 'Content-Type, Authorization, Accept, X-Requested-With, Origin',
    'Access-Control-Allow-Credentials' => 'true'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
