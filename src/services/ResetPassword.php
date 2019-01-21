<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;

class ResetPassword extends CoreService implements DefaultService {

    public $transaction = true;

    public function getDescription()
    {
        return "Reset Password";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $user = service_exec("findUserById", ["id" => $input["id"]]);
        $user->password = password_hash($input["password"], PASSWORD_BCRYPT);
        $user->updated_by = $input["session"]->user_id;
        $user->updated_at = DATE_TIME_ACCESS;
        $user->version = $user->version+1;
        $user->save();

        return [ 
            "success_message" => "Berhasil mereset password user ".$user->username
        ];
    }

    public function rules()
    {
        return [];
    }

}