<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use App\Model\User;
use DB;

/**
 * Find User By Index
 * 
 * @author Agung 
 */

class FindUserByIndex extends CoreService implements DefaultService {

    public $transaction = false;
    public $task = "viewUser";

    public function prepare($data)
    {
        
    }

    public function process($data, $originalData)
    {
        return User::where("username", $data["username"])->first();
    }

}