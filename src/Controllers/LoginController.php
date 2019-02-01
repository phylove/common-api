<?php

namespace Phy\CommonApi\Controllers;

use App\Http\Controllers\Controller;
use Phy\Core\CoreException;
use Phy\Core\CoreResponse;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    function doLogin(Request $request)
    {

        try {
            $loginAuth = app()->make('loginAuth');
            $result = $loginAuth->execute($request->all());
            $output['token'] = JWT::encode($result, env('JWT_SECRET', 'xxx'));

        } catch (CoreException $ex){
            return CoreResponse::fail($ex);
        }

        
        return CoreResponse::ok($output);
    }

    function doLogout(Request $request)
    {
        try {
            $doLogout = app()->make('doLogout');
            $result = $doLogout->execute([
                "token" =>  $request->header('Authorization')
            ]);

        } catch (CoreException $ex){
            return CoreResponse::fail($ex);
        }

        return [
            "success" => true
        ];
    }
}
