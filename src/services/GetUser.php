<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use App\Model\User;
use DB;

class GetUser extends CoreService implements DefaultService {

    public $transaction = false;
    public $task = "viewUser";
    public $system = true;

    public function getDescription()
    {
        return "Get user list";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        return User::select("username","email","full_name")
            ->paginate($input["limit"]);
    }

}