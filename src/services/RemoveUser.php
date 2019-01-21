<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;

class RemoveUser extends CoreService implements DefaultService {

    public $transaction = true;

    public function getDescription()
    {
        return "Remove User";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $user = service_exec("findUserById", ["id" => $input["id"]]);
        $user->delete();

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