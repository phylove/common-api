<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\User;

/**
 * Add User
 * 
 * @author Agung 
 */

class AddUser extends CoreService implements DefaultService {

    public $transaction = true;

    public function prepare($data)
    {
        $user = service_exec('findUserByIndex', ["username" => $data["username"]]);
        if(!is_null($user)){
            $this->errorListValidation(["username" => ["Username sudah ada"] ]);
        }

        $user = service_exec('findUserBySecondIndex', ["email" => $data["email"]]);
        if(!is_null($user)){
            $this->errorListValidation(["email" => ["Email sudah terdaftar"] ]);
        }
    }

    public function process($data, $originalData)
    {
        $user = new User();
        $user->username = $data["username"];
        $user->email = $data["email"];
        $user->full_name = $data["full_name"];
        $user->password = password_hash($data["password"], PASSWORD_BCRYPT);
        $user->role_default_id = $data["role_default_id"];
        $user->created_by = $data["session"]->user_id;
        $user->updated_by = $data["session"]->user_id;
        $user->created_at = DATE_TIME_ACCESS;
        $user->updated_at = DATE_TIME_ACCESS;
        $user->version = 0;
        $user->save();


        return $user;
    }

    public function rules()
    {
        return [
            "username" => "required",
            "email" => "required|email",
            "full_name" => "required",
            "role_default_id" => "required",
            "password" => "required"
        ];
    }

}