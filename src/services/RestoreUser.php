<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use App\Model\User;

class RestoreUser extends CoreService implements DefaultService {

    public $transaction = true;
    public $task = "removeUser";

    public function getDescription()
    {
        return "Restore User";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $user = service_exec("findUserById", ["id" => $input["id"]]);
        $user->active = "N";
        $user->updated_by = $input["session"]->user_id;
        $user->updated_at = DATE_TIME_ACCESS;
        $user->version = $user->version+1;
        $user->save();

        return [ 
            "user" => $user,
            "success_message" => "Berhasil menonaktifkan user ".$user->username
        ];
    }

    public function rules()
    {
        return [];
    }

}