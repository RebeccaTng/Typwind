<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class StudentController extends Controller
{
    public function home()
    {
        //$menu_model=new \Menu_model();
        $data['title'] = "Home";
        $data['content'] = view('/StudentViews/homeContent',$data);
        //$this->set_common_data("Home",'homeContent')
        //$data['menu_items'] =$menu_model->get_menuitems('Home');
        return view('/StudentViews/main2', /*$this->*/$data);
    }

    public function exercises()
    {
        $data['title'] = "Exercises";
        $data['content'] = view('/StudentViews/exercisesContent', $data);

        return view('/StudentViews/main2', $data);
    }
}