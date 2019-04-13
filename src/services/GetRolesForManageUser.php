<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use Phy\CoreApi\Models\Role;
use DB;

class GetRolesForManageUser extends CoreService implements DefaultService {

    public $transaction = false;
    public $task = "addUser";

    public function getDescription()
    {
        return "Get role for manage user";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $sql = "SELECT id, role_name FROM roles";
        
        return DB::select($sql);
    }

}