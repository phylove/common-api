<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\ApiToken;
use DB;

class GetUsers extends CoreService implements DefaultService {

    public $transaction = false;

    public function getDescription()
    {
        return "Get user list";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $sql = "SELECT * FROM phy_users 
            WHERE (username ILIKE :keyword OR email ILIKE :keyword)
            AND full_name ILIKE :full_name 
            LIMIT :limit OFFSET :offset";
        
        $params = [
            "keyword" => "%".$input["keyword"]."%",
            "full_name" => "%".$input["full_name"]."%",
            "limit" => $input["limit"],
            "offset" => $input["limit"]*($input["page"]-1)
        ];
        
        return DB::select($sql, $params);
    }

}