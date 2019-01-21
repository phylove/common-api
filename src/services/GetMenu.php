<?php

namespace App\Service;

use Phy\Core\CoreService;
use Phy\Core\DefaultService;
use Phy\Core\CoreException;
use Phy\Core\Models\ApiToken;

class GetMenu {

    private $menus = [];
    protected static $instance = null;

    static public function getInstance() {
        if (is_null(self::$instance)) {
            $class = get_called_class();
            self::$instance = new $class();
        }
        return self::$instance;
    }


    public function add($orderNo, $label, $url, $icon, $active, $submenus = []){
    	$menu = [ 
            'order_no' => $orderNo,
            'label' => $label, 
            'url' => $url,
            'icon' => $icon,    
            'active' => $active,
            'sub' => $submenus,                        
        ];
    	
        $this->menus[] =  $menu;
        // usort($this->menus, 'sortByOrder');
        
        return $menu;
        
    }
    public function addSubMenu($orderNo, $label, $url, $icon, $active, $submenus = []){
    	$will_be_added = [ 
            'order_no' => $orderNo,
            'label' => $label, 
            'url' => $url,
            'icon' => $icon,    
            'active' => $active,
            'sub' => $submenus                      
        ];    
        
        return $will_be_added;
        
    }    

    public function execute($input)
    {
        return $this->menus;
    }

}