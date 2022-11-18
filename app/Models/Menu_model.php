<?php

class Menu_model
{
//<a href="Link" title= "title text" class ="className">name</a>
public $menu_items;

    public function __construct()
    {
        $this->menu_items = array(
            array('name'=>'Home', 'title' => 'Go home', 'link'=> 'home','className'=>'active' ),
            array('name'=>'Profile', 'title' => 'Look at profile', 'link'=> 'profile','className'=>'inactive' ),
            array('name'=>'Students', 'title' => 'Look at students', 'link'=> 'students','className'=>'inactive' ),
            array('name'=>'Exercises', 'title' => 'Look at exercises', 'link'=> 'exercises','className'=>'inactive' )
        );
    }

    private function set_active($menutitle){
        foreach ($this->menu_items as &$item){
            if (strcasecmp($menutitle,$item['name'])==0){
                $item['className'] ='active';
            }
            else{
                $item['className'] ='inactive';
            }
        }
    }

    public function get_menuitems($menutitle='home'){
        $this->set_active($menutitle);
        return $this->$this->menu_items;
    }
}