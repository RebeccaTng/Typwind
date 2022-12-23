<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;
use App\Models\Teachers_model;
use App\Models\Menu_model;

class ExpertController extends BaseController
{

    /// CSS FILES *********************
    private array $commonCssFiles = array("components/main.css", "components/menubar.css", "components/generalComponents.css", "components/expertComponents.css");
    private array $studentsList = array("expert/studentsList.css");
    private array $home = array("expert/home.css");
    private array $exercises = array("expert/exercises.css");
    private array $studentOverview = array("expert/studentOverview.css");
    private array $editStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css");
    private array $addStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css", "expert/addStudentPage.css");
    private array $profile = array("expert/profile.css");
    private array $editProfilePage = array("expert/profile.css", "expert/editProfile.css");


    /// END OF CSS FILES ************************
    //    private $data;
    private Students_model $students_model;
    private Teachers_model $teachers_model;
    private $menu_model;

    public function __construct() {
        $this->menu_model = new Menu_model();
        $this->students_model = new Students_model();
        $this->teachers_model = new Teachers_model();
    }
    public function view($page = 'home',$arg='0')
    {
        if (! is_file(APPPATH . 'Views/pages/experts/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $css = ['cssFiles' =>  $this->getCSSFile($page)];
        $page_data =$this->getDataForPage($page,$arg);
        if(sizeof($page_data)>0) $data = array_merge($page_data,$css);
        else $data = $css;
        return view('/pages/experts/' . $page,$data);
    }

    ////// SET UP METHODS ALL
    private function getDataForPage($pageName,$args): array
    {
        switch ($pageName) {
            case 'home':
                return $this->home();
            case 'studentsList':
                return $this->studentsList();
            case 'exercises':
                return $this->exercises();
            case 'studentOverview':
                return $this->studentOverview($args);
            case 'editStudentPage':
                return $this->editStudentPage($args);
            case 'addStudentPage':
                return $this->addStudentPage();
            case 'profile':
                return $this->profile();
            case 'editProfilePage':
                return $this->editProfilePage();

            default:
                return $this->commonCssFiles;
        }
    }
    private function getCSSFile($pageName): array
    {
        switch ($pageName) {
            case 'home':
                return$this->includeCSSFilesInCommonFiles( $this->home);
            case 'studentsList':
                return $this->includeCSSFilesInCommonFiles( $this->studentsList);
            case 'exercises':
                return $this->includeCSSFilesInCommonFiles( $this->exercises);
            case 'studentOverview':
                return $this->includeCSSFilesInCommonFiles( $this->studentOverview);
            case 'editStudentPage':
                return $this->includeCSSFilesInCommonFiles( $this->editStudentPage);
            case 'addStudentPage':
                return $this->includeCSSFilesInCommonFiles( $this->addStudentPage);
            case 'profile':
                return $this->includeCSSFilesInCommonFiles( $this->profile);
            case 'editProfilePage':
                return $this->includeCSSFilesInCommonFiles( $this->editProfilePage);
            default:
                return $this->commonCssFiles;
        }
    }


    private function includeCSSFilesInCommonFiles($arrayOfCSSFiles): array{
        return array_merge($this->commonCssFiles, $arrayOfCSSFiles);
    }


    ////// SET UP METHODS FOR EACH VIEW
    public function home():array
    {


        $data['menu_items'] = $this->menu_model->get_menuitems();
        $data['teachers'] = $this->teachers_model->get_all_teachers();
        session()->set('teachers', $data['teachers']);
        return ($data);
    }
    public function studentsList():array
    {
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Students');

        $students= $this->students_model->get_students();
        $this->data['students'] = $students;
        $this->data['teachers'] = session()->get('teachers');
        session()->set('students', $this->data['students']);
        return $this->data;
    }

    public function exercises():array
    {
        $model = model(ExerciseModel::class);
        $data = ['exercises' => json_encode($model->getExercises())];
        $data['menu_items'] = $this->menu_model->get_menuitems('Exercises');
        return ($data);
    }

    public function studentOverview($idStudents): array
    {
        $this->data['idStudents']=$idStudents;
        $this->data['students'] = session()->get('students');
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return  $this->data;
    }

    public function editStudentPage($idStudents): array
    {
        $this->data['idStudents']=$idStudents;
        $this->data['students'] = session()->get('students');
        $this->data['teachers'] = session()->get('teachers');
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return( $this->data);
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


        if ($handSelection=="left")
        {
            $this->data['handSelection']=2;
        }
        if ($handSelection=="right")
        {
            $this->data['handSelection']=1;
        }
        if ($handSelection=="both"){
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
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Students');

        $css = ['cssFiles' =>  $this->getCSSFile("studentsList")];
        $dataAddStudent = array_merge($this->getDataForPage('studentsList',0),$css);
        return view('pages/experts/studentsList', $dataAddStudent);

    }

    public function addStudentPage():array
    {
        $data['teachers']=session()->get('teachers');
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return ( $data);
    }
    public function addStudent()
    {
        $data['firstname']= $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['email']= $_POST['email'];
/*        $data['password'] = $_POST['password'];*/
        $gender= $_POST['gender'];
        if($gender == "male")
        {
            $data['gender']= 1;
        }
        else{
            $data['gender']=0;
        }
        $handSelection=$_POST['handSelection'];
        if ($handSelection=="One Hand, right hand")
        {
            $data['handSelection']=1;
        }
        if ($handSelection=="One Hand, left hand")
        {
            $data['handSelection']=2;
        }
        else{
            $data['handSelection']=0;
        }
        $data['isActive'] = isset($_POST['active']);
        $data['birthday'] = $_POST['birthday'];
        $data['idTeacher_fk'] = $_POST['teachers'];
        $this->students_model->add_student($data);

        $data['menu_items'] = $this->menu_model->get_menuitems('Students');


        $css = ['cssFiles' =>  $this->getCSSFile("studentsList")];
        $dataAddStudent = array_merge($this->getDataForPage('studentsList',0),$css);
        return view('pages/experts/studentsList', $dataAddStudent);
//        return view('pages/experts/studentsList', $data);
    }

    public function profile():array
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('My Profile');
        return $data;
    }

    public function editProfilePage()
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('My Profile');
        return $data;
    }

    public function editProfile()
    {
        $this->data['idTeachers']= session()->id;

        $this->data['firstname']= $_POST['firstname'];
        session()->firstname = $this->data['firstname'];
        $this->data['lastname'] = $_POST['lastname'];
        session()->lastname = $this->data['lastname'];
        $this->data['isActive'] = isset($_POST['active']);
        session()->isActive = $this->data['isActive'];
        $this->data['email']= $_POST['email'];
        session()->email = $this->data['email'];

        $this->data['password']= $_POST['password'];

        $this->teachers_model->edit_teacher($this->data);
        return view('pages/experts/profile');
    }

}
