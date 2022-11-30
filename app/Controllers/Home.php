<?php

namespace App\Controllers;


use App\Models\Students_model;
use App\Models\Teachers_model;

class Home extends BaseController
{

    private $data;
    private Students_model $students_model;
    private Teachers_model $teachers_model;


    public function __construct() {
        $this->students_model = new Students_model();
        $this->teachers_model = new Teachers_model();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function test($name_param="random name")
    {
        $data['firstname']=$name_param;
        return view('welcome', $data);
    }

    public function getStudents()
    {
        $idTeacher = $_GET['idTeacher'];
        $students= $this->students_model->get_students();
        $this->data['students'] = $students;
        return $this->response->setJSON($students);
        //return view('students', $this->data);
    }

    public function addStudent()
    {
        $data['firstname']= $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['email']= $_POST['email'];
        $data['password'] = $_POST['password'];
        $data['birthday'] = $_POST['birthday'];
        $data['idTeacher_fk'] = $_POST['idTeacher'];
        $this->students_model->add_student($data);
        return view('welcome', $data);
    }

    public function getTeacher()
    {
        $idTeachers = $_GET['idTeachers'];
        $teacher= $this->teachers_model->get_teacher($idTeachers);
        $this->data['teacher'] = $teacher;
        return view('teacher', $this->data);
    }

    public function addTeacher()
    {
        $data['firstname']= $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['email']= $_POST['email'];
        $data['password'] = $_POST['password'];
        $this->teachers_model->add_teacher($data);
        return view('welcome', $data);
    }

}
