<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;

class AddUser extends CoreService implements DefaultService {

    public $transaction = true;

    public function getDescription()
    {
        return "Add User";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        $user = new User();
        $user->username = $input["username"];
        $user->email = $input["email"];
        $user->full_name = $input["full_name"];
        $user->password = password_hash($input["password"], PASSWORD_BCRYPT);
        $user->created_by = $input["session"]->user_id;
        $user->updated_by = $input["session"]->user_id;
        $user->created_at = DATE_TIME_ACCESS;
        $user->updated_at = DATE_TIME_ACCESS;
        $user->version = 0;
        $user->save();

        return $user;
    }

    public function rules()
    {
        return [];
    }

}