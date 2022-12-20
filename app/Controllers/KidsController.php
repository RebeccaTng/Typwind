<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;
use App\Models\Teachers_model;

class KidsController extends BaseController
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
        $exercises=$this->students_model->getExercises();
        session()->set('exercises', $exercises);
        return view('pages/kids/home');
    }

    public function intro()
    {

        $this->data['exercises']= session()->get('exercises');
        $this->data['idExercises']= $_GET['idExercises'];
        return view('pages/kids/intro',$this->data);
    }

    public function feedback()
    {

        $this->data['exercises']= session()->get('exercises');
        $idExercises= $_GET['idExercises'];
        $this->data['idExercises']=$idExercises;
        return view('pages/kids/feedback',$this->data);
    }

    public function view($page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/kids/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model = model(Students_model::class);

        //Testing queries to visualise the Arrow Navigation in Student exercise page, please leave these in!
        $all=$model->getExercises();
        $specific=$model->getSpecificExercises(session()->id);
        $joined_exercises_scores=$model->getStudentExercises(session()->id);

        $data = [
            'title' => ucfirst($page),// Capitalize the first letter
            'exercises' => $joined_exercises_scores
        ];



        return view('pages/kids/' . $page, $data);
    }

    public function exercise_view($idStudents)
    {
        $this->data['idStudents']=$idStudents;
        $this->data['test'] = $this->students_model->get_students();
        return view('pages/kids/exercise_view', $this->data);
    }/*
$this->data['exercises']=
$idExercises= $_GET['idExercises'];
$this->data['idExercises']=$idExercises;
return view('pages/kids/feedback',$this->data);*/
    }