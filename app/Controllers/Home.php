<?php

namespace App\Controllers;

class Home extends BaseController
{

    private $menu_model;
    private $data;

    public function __construct(){
        //$this->menu_model = new \Menu_model();
    }

/*    private function set_common_data($title,$viewName){
        $this->$data['title']=$title;
        $this->$data['content']= view($viewName,$this->$data);;
    }*/

    public function hello($name_param="Jeff")
    {
        $data['title'] = $name_param;
        $data['content'] = $name_param;
        return view('hello', $data);
    }

    public function home()
    {
        //$menu_model=new \Menu_model();
        $data['title'] = "Home";
        $data['content'] = view('homeContent',$data);
        //$this->set_common_data("Home",'homeContent')
        //$data['menu_items'] =$menu_model->get_menuitems('Home');

        return view('main', /*$this->*/$data);
    }

    public function students()
    {
        $data['title'] = "Students";
        $data['students'] = array(array('name' => 'Loïc'), array('name' => 'Jeff'));
        $data['content'] = view('studentsContent', $data);
        return view('main', $data);
    }

    public function profile()
    {
        $data['title'] = "My Profile";
        $data['content'] = view('profileContent', $data);

        return view('main', $data);
    }

    public function exercises()
    {
        $data['title'] = "Exercises";
        $data['content'] = view('exercisesContent', $data);

        return view('main', $data);
    }

    public function menuTest()
    {
        $data['title'] = "Menu Testing";
        return view('menuTest',$data);
    }

}
