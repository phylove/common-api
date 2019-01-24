<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;

/**
 * Edit User
 * 
 * @author Agung 
 */

class EditUser extends CoreService implements DefaultService {

    public $transaction = true;

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $user = service_exec("findUserById", ["id" => $input["id"]]);
        $user->full_name = $input["full_name"];
        $user->updated_by = $input["session"]->user_id;
        $user->updated_at = DATE_TIME_ACCESS;
        $user->version = 0;
        $user->save();

        return [ 
            "user" => $user,
            "success_message" => "Berhasil mengubah user ".$user->username
        ];
    }

    public function rules()
    {
        return [];
    }

}