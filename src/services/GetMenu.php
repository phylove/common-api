<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\ApiToken;

class GetMenu extends CoreService implements DefaultService {

    public $transaction = false;

    public function getDescription()
    {
        return "Get Menu";
    }

    public function prepare($input)
    {
        
    }

    public function process($input, $originalInput)
    {
        return 
        [
            [
                "label" => "Home",
                "icon" => "fa-dashboard",
                "active" => false,
                "sub" =>
                    [
                        [
                            "active" => false,
                            "label" => "Dashboard",
                            "url" => url("/")
                        ],
                    ]
            ],
            [
                "label" => "Kelola User",
                "icon" => "fa-dashboard",
                "active" => false,
                "sub" =>
                    [
                        [
                            "active" => false,
                            "label" => "Daftar User",
                            "url" => url("/manage-user")
                        ],
                    ]
            ]
        ];
    }

}