<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\Role;
use DB;

class GetRolesForManageUser extends CoreService implements DefaultService {

    public $transaction = false;

    public function getDescription()
    {
        return "Get role for manage user";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $sql = "SELECT id AS key_select, role_name AS value_select 
            FROM phy_roles";
        
        return DB::select($sql);
    }

}