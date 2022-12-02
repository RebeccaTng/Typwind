<?php

namespace App\Controllers;

use App\Models\Students_model;
use App\Models\Teachers_model;

class ExpertController extends BaseController
{

    private $data;
    private Students_model $students_model;
    private Teachers_model $teachers_model;

    public function __construct() {
        $this->students_model = new Students_model();
        $this->teachers_model = new Teachers_model();
    }

    public function home()
    {
        $data['title'] = "Home";
        $this->data['teachers'] = $this->teachers_model->get_all_teachers();
        cache()->save('teachers', $this->data['teachers']);
        return view('pages/experts/home_content', $data);
    }

    public function studentsList()
    {
        //$this->data['title']= "students overview";
        $students= $this->students_model->get_students();
        $this->data['students'] = $students;
        cache()->save('students', $this->data['students']);
        //return $this->response->setJSON($students);
        return view('pages/experts/studentsList', $this->data);
    }

    public function studentOverview($idStudents)
    {
        $this->data['idStudents']=$idStudents;
        $this->data['students'] = cache()->get('students');
        return view('pages/experts/studentOverview', $this->data);
    }

    public function editStudentPage($idStudents)
    {
        $this->data['idStudents']=$idStudents;
        $this->data['students'] = cache()->get('students');
        $this->data['teachers'] = cache()->get('teachers');
        return view('pages/experts/editStudentPage', $this->data);
    }
    public function editStudent($idStudents)
    {
        $this->data['idStudents']=$idStudents;
        $this->data['firstname']= $_POST['firstname'];
        $this->data['lastname'] = $_POST['lastname'];
        $gender= $_POST['gender'];
        if($gender == "male")
        {
            $this->data['gender']= 1;
        }
        else{
            $this->data['gender']=0;
        }
        $this->data['birthday'] = $_POST['birthday'];

        $this->data['idTeacher_fk'] = $_POST['teachers'];;


        $handSelection=$_POST['handSelection'];
        if ($handSelection=="One Hand")
        {
            $this->data['handSelection']=1;
        }
        else{
            $this->data['handSelection']=0;
        }
        $this->data['isActive'] = isset($_POST['active']);
        $this->data['notes'] = $_POST['notes'];
        $this->data['email']= $_POST['email'];
        $this->data['password']= $_POST['password'];
        $this->data['reminder']= $_POST['reminder'];
        $this->data['coins']= $_POST['coins'];
        $this->data['streak']= $_POST['streak'];
        $this->students_model->edit_student($this->data);
        $students= $this->students_model->get_students();
        $this->data['students'] = $students;
        cache()->save('students', $this->data['students']);
        return view('pages/experts/studentsList', $this->data);
    }

    public function addStudentPage()
    {
        $data['teachers']=cache()->get('teachers');
        return view('pages/experts/addStudent', $data);
    }
    public function addStudent()
    {
        $data['firstname']= $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['email']= $_POST['email'];
        $data['password'] = $_POST['password'];
        $gender= $_POST['gender'];
        if($gender == "male")
        {
            $data['gender']= 1;
        }
        else{
            $data['gender']=0;
        }
        $handSelection=$_POST['handSelection'];
        if ($handSelection=="One Hand")
        {
            $data['handSelection']=1;
        }
        else{
            $data['handSelection']=0;
        }
        $data['isActive'] = isset($_POST['active']);
        $data['birthday'] = $_POST['birthday'];
        $data['idTeacher_fk'] = $_POST['teachers'];
        $this->students_model->add_student($data);

        $students= $this->students_model->get_students();
        $data['students'] = $students;
        cache()->save('students', $data['students']);
        return view('pages/experts/studentsList', $data);
    }

    public function profile()
    {
        $idTeachers= $_GET['idTeachers'];
        $data['teachers']= cache()->get('teachers');
        $data['idTeachers']=$idTeachers;
        return view('pages/experts/profile', $data);
    }

    public function editProfilePage($idTeachers)
    {
        $this->data['idTeachers']=$idTeachers;
        $this->data['teachers'] = cache()->get('teachers');
        return view('pages/experts/editProfilePage', $this->data);
    }

    public function editProfile($idTeachers)
    {
        $this->data['idTeachers']=$idTeachers;
        $this->data['firstname']= $_POST['firstname'];
        $this->data['lastname'] = $_POST['lastname'];
        $this->data['isActive'] = isset($_POST['active']);
        $this->data['email']= $_POST['email'];
        $this->data['password']= $_POST['password'];
        $this->teachers_model->edit_teacher($this->data);
        $this->data['teachers'] = $this->teachers_model->get_all_teachers();
        cache()->save('teachers', $this->data['teachers']);
        return view('pages/experts/home_content');
    }





}
