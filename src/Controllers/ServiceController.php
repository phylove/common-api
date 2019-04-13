<?php

namespace Phy\CommonApi\Controllers;

use App\Http\Controllers\Controller;
use Phy\CoreApi\CoreException;
use Phy\CoreApi\CoreResponse;
use Phy\CoreApi\CallService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function service(Request $request)
    {
        $input = $request->all();
        return CallService::execute($input['payload'], $input['service_name']);
    }

}