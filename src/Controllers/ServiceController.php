<?php

namespace Phy\CommonApi\Controllers;

use App\Http\Controllers\Controller;
use Phy\Core\CoreException;
use Phy\Core\CoreResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function service(Request $request)
    {
        try {
            $service = $request->get('service_name');
            
            $payload = $request->get('payload');
            $sessions = app()->make('sessions')->getSessionAll();
            $payload['session'] = $sessions;
            
            $object = service($service);
            $result = $object->execute($payload);
            return CoreResponse::ok($result);

        } catch (CoreException $ex){
            return CoreResponse::fail($ex);
        }
    }

}