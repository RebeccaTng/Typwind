<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;

class KidsController extends BaseController
{



    /// CSS FILES *********************
    private  array $commonCssFiles = array("components/main.css", "components/menubar.css", "components/generalComponents.css");
    private array $home = array();
    private array $intro = array();
    private array $feedback = array();
    private array $exercises = array();





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
        $exercises=$this->students_model->getExercises();
        session()->set('exercises', $exercises);
        return array();
    }

    public function intro($idExercises)
    {

        $this->data['exercises']= session()->get('exercises');
//        $this->data['idExercises']= $_GET['idExercises'];
        $this->data['idExercises']= $idExercises;
        return ($this->data);
    }

    public function feedback($idExercises):array
    {
        $data1['idStudent_fk'] = $_POST['idStudent_fk'];
        $data1['idExercise_fk'] = $_POST['idExercise_fk'];
        $data1['score'] = $_POST['score'];
        $data1['date'] = $_POST['date'];
        $this->students_model->add_results($data1);

        $this->data['exercises']= session()->get('exercises');
//        $idExercises= $_GET['idExercises'];
        $this->data['idExercises']=$idExercises;
        return ($this->data);
    }



    public function exercises():array
    {

        $model = model(Students_model::class);

        //Testing queries to visualise the Arrow Navigation in Student exercise page, please leave these in!
        $all=$model->getExercises();
        $specific=$model->getSpecificExercises(session()->id);
        $joined_exercises_scores = $model->getStudentExercises(session()->id);

        $data = ['exercises' => $joined_exercises_scores];

        return ($data);
    }

}