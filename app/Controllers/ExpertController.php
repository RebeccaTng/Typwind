<?php

namespace App\Controllers;

class ExpertController extends BaseController
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
        $data['content'] = view('/ExpertViews/homeContent',$data);
        //$this->set_common_data("Home",'homeContent')
        //$data['menu_items'] =$menu_model->get_menuitems('Home');

        return view('/ExpertViews/main', /*$this->*/$data);
    }

    public function students()
    {
        $data['title'] = "Students";
        $data['students'] = array(array('name' => 'Loïc Rondou'), array('name' => 'Jeff MyName'));
        $data['content'] = view('/ExpertViews/studentsContent', $data);
        return view('/ExpertViews/main', $data);
    }

    public function profile()
    {
        $data['title'] = "My Profile";
        $data['content'] = view('/ExpertViews/profileContent', $data);

        return view('/ExpertViews/main', $data);
    }

    public function exercises()
    {
        $data['title'] = "Exercises";
        $data['content'] = view('/ExpertViews/exercisesContent', $data);

        return view('/ExpertViews/main', $data);
    }

    public function student()
    {
        $data['title'] = "Student Content";
        $data['content'] = view('/ExpertViews/studentContent', $data);

        return view('/ExpertViews/main', $data);
    }

    public function editStudent()
    {
        $data['title'] = "Student Content";
        $data['content'] = view('/ExpertViews/editStudentContent', $data);

        return view('/ExpertViews/main', $data);
    }

    public function editExpert()
    {
        $data['title'] = "Student Content";
        $data['content'] = view('/ExpertViews/editExpertContent', $data);

        return view('/ExpertViews/main', $data);
    }

    public function menuTest()
    {
        $data['title'] = "Menu Testing";
        return view('menuTest',$data);
    }
}
