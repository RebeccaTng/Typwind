<?php

//This menu model isn't used yet.
//It should be used if we want to indicate which tab is active ('highlight active menu item')

namespace App\Models;

use CodeIgniter\Model;
class Menu_model extends Model
{
    private $menu_items;


    public function __construct()
    {
        $this->menu_items = array (
            array('name' => 'home', 'title' => 'Go home', 'link' => 'home', 'className' => 'active'),
            array('name' => 'studentsList', 'title' => 'Check student', 'link' => 'studentsList', 'className' => 'inactive') ,
            array('name' => 'exercises', 'title' => 'Check Exercises', 'link' => 'exercises', 'className' => 'inactive') ,
            array('name' => 'myProfile', 'title' => 'Review my Profile', 'link' => 'myProfile', 'className' => 'inactive') ,
        );
    }

    private function set_active($menutitle) {
        foreach ($this->menu_items as &$item) {
            if (strcasecmp($menutitle, $item['name']) == 0) {
                $item['className'] = 'active';
            } else {
                $item['className'] = 'inactive';
            }
        }
    }

    public function get_menuitems($menutitle = 'home') {
        $this->set_active($menutitle);
        return $this->menu_items;
    }


}