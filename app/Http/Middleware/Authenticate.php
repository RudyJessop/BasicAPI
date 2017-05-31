<?php

namespace App\Http\Middleware;

use Closure;
use CTL\JWTBase;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{

    /**
     * The JSON web token interface
     *
     * @var \CTL\JWTBase;
     */
    protected $jwt;

    /**
     * Create a new middleware instance.
     *
     * @param  \CTL\JWTBase $jwt
     * @return void
     */
    public function __construct(JWTBase $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $passedToken = $this->jwt->validateJWTtoken($request->header('x-access-token') );

        if(empty($passedToken) ){
            return response()->json([
                'error' => [
                    'message' => 'Token Missing',
                    'code' => '100'
                ]
            ], 403);
        }

        return $next($request);
    }
}
