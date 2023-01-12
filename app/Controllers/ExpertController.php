<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;
use App\Models\Teachers_model;
use App\Models\Menu_model;

class ExpertController extends BaseController
{

    /// CSS FILES *********************
    private array $commonCssFiles = array("components/main.css", "components/generalComponents.css", "components/menubar.css", "components/expertComponents.css");
    private array $studentsList = array("expert/studentsList.css");
    private array $home = array("expert/home.css");
    private array $exercises = array("expert/exercises.css");
    private array $studentOverview = array("expert/studentOverview.css");
    private array $editStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css");
    private array $addStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css", "expert/addStudentPage.css");
    private array $profile = array("expert/profile.css");
    private array $editProfilePage = array("expert/profile.css", "expert/editProfile.css");
    private array $exerciseContentPage = array("expert/exercises.css","expert/exerciseContentPage.css");
    private array $addExercisePage = array("expert/exercises.css","expert/addExercisePage.css");
    private array $editExercisePage = array("expert/exercises.css","expert/addExercisePage.css");

    /// END OF CSS FILES ************************
    //    private $data;
    private Students_model $students_model;
    private Teachers_model $teachers_model;
    private ExerciseModel  $exercises_model;

    private $menu_model;

    public function __construct() {
        $this->menu_model = new Menu_model();
        $this->students_model = new Students_model();
        $this->teachers_model = new Teachers_model();
        $this->exercises_model = new ExerciseModel();
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
            case 'exerciseContentPage':
                return $this->exerciseContentPage($args);
            case 'addExercisePage':
                return $this->addExercisePage();
            case 'editExercisePage':
                return $this->editExercisePage($args);
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
            case 'exerciseContentPage':
                return $this->includeCSSFilesInCommonFiles( $this->exerciseContentPage);
            case 'addExercisePage':
                return $this->includeCSSFilesInCommonFiles( $this->addExercisePage);
            case 'editExercisePage':
                return $this->includeCSSFilesInCommonFiles( $this->editExercisePage);
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
        $data['students'] = $this->students_model->get_students();
        $data['avatars'] = $this->students_model->getStudentsAvatarId();
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');
        $data['teachers'] = session()->get('teachers');
        session()->set('students', $data['students']);
        return $data;
    }

    public function exercises():array
    {
        $model = model(ExerciseModel::class);
        $data = ['exercises' => json_encode($model->getExercises())];
        $data['menu_items'] = $this->menu_model->get_menuitems('Exercises');
        session()->set('exercises', $data['exercises']);
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
        $this->data['notes'] = nl2br($_POST['notes']);
        $this->data['email']= $_POST['email'];
        $this->data['password']= $_POST['password'];
        $this->data['reminder']= $_POST['reminder'];
        $this->data['coins']= $_POST['coins'];
        $this->data['streak']= $_POST['streak'];
        $this->students_model->edit_student($this->data);
        return redirect()->to('experts/studentsList');
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
        $data['notes'] = nl2br($_POST['notes']);
        $this->students_model->add_student($data);

        return redirect()->to('experts/studentsList');

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
        $this->teachers_model->edit_teacher($this->data);
        $this->data['teachers'] = $this->teachers_model->get_all_teachers();
        session()->set('teachers', $this->data['teachers']);
        return redirect()->to('experts/profile');

    }

    public function addExercisePage():array
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return $data;
    }

    public function editExercisePage($idExercises):array
    {
        $this->data['idExercises']=$idExercises;
        $this->data['exercises'] = session()->get('exercises');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return( $this->data);
    }

    public function exerciseContentPage($idExercises):array
    {
        $this->data['idExercises']=$idExercises;

        $this->data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return( $this->data);
    }

    public function addExercise()
    {
        $data['name']= $_POST['title'];
        $data['text'] = $_POST['content'];
        $data['lesson'] = "Beans";
        $data['idTeacher_fk']= session()->id;
        $data['isCustom']= 1;
        $this->exercises_model->add_exercise($data);
        return redirect()->to('experts/exercises');
    }

    public function editExercise($idExercises)
    {
        $this->data['idExercises']=$idExercises;
        $this->data['name']= $_POST['title'];
        $this->data['text'] = $_POST['content'];
        $this->data['idTeacher_fk']= session()->id;
        $this->data['isCustom']= 1;
        $this->exercises_model->edit_exercise($this->data);
        return redirect()->to('experts/exercises');
        
    }

    public function storeExercise($idExercises=null)
    {
        helper(['form']);
        $rules = [
            'title'          => 'required|min_length[5]|max_length[50]|is_unique[exercises.name]',
            'content'          => 'required|min_length[2]'
        ];

        if($this->validate($rules)){

            $this->data = [
                'idExercises' => $idExercises,
                'name'     => $_POST['title'],
                'text'     => $_POST['content'],
                'lesson'    => "Beans",
                'idTeacher_fk' => session()->id,
                'isCustom'    => 1
            ];
            if($idExercises==null){
            $this->exercises_model->add_exercise($this->data);}
            else{$this->exercises_model->edit_exercise($this->data);
            }
            return redirect()->to('experts/exercises');
        }else{
            $data['validation'] = $this->validator;
            session()->set("validation",$data['validation']);
            if($idExercises==null){
                return redirect()->to('experts/addExercisePage');}
            else{
                return redirect()->to('experts/editExercisePage/'.$idExercises);
            }
        }
    }
}
