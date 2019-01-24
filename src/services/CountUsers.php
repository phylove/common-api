<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\ApiToken;
use DB;

/**
 * Count User
 * 
 * @author Agung 
 */

class CountUsers extends CoreService implements DefaultService {

    public $transaction = false;

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $sql = "SELECT COUNT(1) AS counter FROM phy_users 
            WHERE (username ILIKE :keyword OR email ILIKE :keyword)
            AND full_name ILIKE :full_name";
        $params = [
            "keyword" => "%".$input["keyword"]."%",
            "full_name" => "%".$input["full_name"]."%",
        ];
        
        return DB::select($sql, $params);
    }

}