<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;

class KidsController extends BaseController
{



    /// CSS FILES *********************
    private  array $commonCssFiles = array("components/main.css", "components/menubar.css", "components/generalComponents.css");
    private array $home = array("kids/home_child.css");
    private array $intro = array("kids/intro_exercise_child.css");
    private array $feedback = array("kids/feedback_exercise_child.css");
    private array $exercises = array();
    private array $exercise = array();





    /// END OF CSS FILES ************************
    private $data;
    private Students_model $students_model;


    public function __construct() {
        $this->students_model = new Students_model();
    }

    public function view($page = 'home',$arg='0')
    {
        if (! is_file(APPPATH . 'Views/pages/kids/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $css = ['cssFiles' =>  $this->getCSSFile($page)];
        $page_data =$this->getDataForPage($page,$arg);
        if(sizeof($page_data)>0) $data = array_merge($page_data,$css);
        else $data = $css;
        //print_r($data);
        return view('/pages/kids/' . $page,$data);
    }

    ////// SET UP METHODS ALL
    private function getDataForPage($pageName,$args): array
    {
        switch ($pageName) {
            case 'home':
                return $this->home();
            case 'intro':
                return $this->intro($args);
            case 'feedback':
                return $this->feedback($args);
            case 'exercises':
                return $this->exercises();
            case 'exercise':
                return $this->exercise($args);



            default:
                return $this->commonCssFiles;
        }
    }
    private function getCSSFile($pageName): array
    {
        switch ($pageName) {
            case 'home':
                return$this->includeCSSFilesInCommonFiles( $this->home);
            case 'intro':
                return$this->includeCSSFilesInCommonFiles( $this->intro);
            case 'feedback':
                return$this->includeCSSFilesInCommonFiles( $this->feedback);
            case 'exercises':
                return$this->includeCSSFilesInCommonFiles( $this->exercises);
            case 'exercise':
                return$this->includeCSSFilesInCommonFiles( $this->exercise);


            default:
                return $this->commonCssFiles;
        }
    }
    private function includeCSSFilesInCommonFiles($arrayOfCSSFiles): array{
        return array_merge($this->commonCssFiles, $arrayOfCSSFiles);
    }
    ///// VIEW METHODS *********************

    public function home():array
    {
        $this->data['exercises']=$this->students_model->getExercises();
        session()->set('exercises', $this->data['exercises']);
        return array();
    }

    public function intro($idExercises)
    {
        $this->data['exercises']= session()->get('exercises');
        //$this->data['idExercises']= $_GET['idExercises'];
        $this->data['idExercises']= $idExercises;
        return ($this->data);
    }
    public function exercise($idExercises)
    {
        $this->data['idStudents']=session()->id;
        $this->data['handSelection']=session()->handSelection;
        $this->data['exercises']= session()->get('exercises');
        $this->data['idExercises']= $idExercises;
        return ($this->data);
    }

    public function feedback($idExercises): string
    {
        $this->data['idStudent_fk'] = $_POST['idStudent_fk'];
        $this->data['idExercise_fk'] = $_POST['idExercise_fk'];
        $this->data['score'] = $_POST['score'];
        $this->data['date'] = $_POST['date'];
        $this->students_model->add_results($this->data);

        $this->data['exercises']= session()->get('exercises');
        $this->data['idExercises']=$idExercises;

        $css = ['cssFiles' =>  $this->getCSSFile("feedback")];
        $dataFeedback = array_merge($this->getDataForPage('feedback',0),$css);
        return view('pages/kids/feedback', $dataFeedback) ;
    }


    public function exercises():array
    {

        $model = model(ExerciseModel::class);

        $data = ['exercises' => json_encode($model->getExercises())];

        return ($data);
    }


}