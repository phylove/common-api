<?php

namespace Phy\CommonApi\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Phy\CoreApi\CoreException;

class ValidTokenUser
{

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
        $token = $request->header('Authorization');

        if(is_null($token)){
            return response()->json([
                'success' => false,
                'error_token' => 'Token not found'
            ], 401);
        }

        try {
            $checkValidToken = app()->make('checkValidToken');
            $checkValidToken->execute(["token" => $token]);
        } catch(CoreException $ex) {

            return response()->json([
                'success' => false,
                'error_token' => $ex->getErrorMessage()
            ], 401);
        }
        
        return $next($request);
    }
}
