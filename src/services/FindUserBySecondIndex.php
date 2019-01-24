<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;
use DB;

/**
 * Find User By Index
 * 
 * @author Agung 
 */

class FindUserBySecondIndex extends CoreService implements DefaultService {

    public $transaction = false;

    public function prepare($data)
    {
        
    }

    public function process($data, $originalData)
    {
        return User::where("email", $data["email"])->first();
    }

}