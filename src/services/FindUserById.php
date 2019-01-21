<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;
use DB;

class FindUserById extends CoreService implements DefaultService {

    public $transaction = false;

    public function getDescription()
    {
        return "Find User";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        return User::find($input["id"]);
    }

}