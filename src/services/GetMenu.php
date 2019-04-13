<?php

namespace App\Service;

use Phy\CoreApi\CoreService;
use Phy\CoreApi\DefaultService;
use Phy\CoreApi\CoreException;
use Phy\CoreApi\Models\ApiToken;

class GetMenu extends CoreService implements DefaultService {

    public $transaction = false;
    public $task = "";
    public $menus = [];

    /**
     * 
     * add menu 
     * 
     * @param string $orderNo no urut
     * @param string $label
     * @param string $icon
     * @param string $task
     * @param array array of submenu
     * 
     * @return void
     * 
     */
    public function add($orderNo, $label, $url, $icon, $task, $submenus = []){
        $menu = [ 
            'order_no' => $orderNo,
            'label' => $label, 
            'url' => $url,
            'icon' => $icon,    
            'task' => $task,
            'sub' => $submenus,                        
        ];
        $this->menus[] =  $menu;
    }

    public function addSubMenu($orderNo, $label, $url, $icon, $task, $submenus = []){
        $submenu = [ 
            'order_no' => $orderNo,
            'label' => $label, 
            'url' => $url,
            'icon' => $icon,    
            'task' => $task,
            'sub' => $submenus                      
        ];   

        return $submenu;
        
    }    

    public function prepare($data)
    {

    }

    public function process($data, $originalData)
    {
        $menus = [];
        $tasks = isset($data["session"]->tasks)? $data["session"]->tasks : [];
        foreach($this->menus as $menu){
            $subs = [];
            foreach($menu["sub"] as $sub){
                if(in_array($sub['task'], $tasks) or $sub['task']===true){
                    $subs[] = $sub;
                }
            }
            if(in_array($menu['task'], $tasks) or $sub['task']===true){
                $menu["sub"] = $subs;
                $menus[] = $menu;
            }
        }

        return $menus;
    }

}