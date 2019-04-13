<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use App\Model\User;
use DB;

/**
 * Find User By Id
 * 
 * @author Agung 
 */

class FindUserById extends CoreService implements DefaultService {

    public $transaction = false;
    public $task = "viewUser";

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        return User::find($input["id"]);
    }

}