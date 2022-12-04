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
        cache()->save('exercises', $exercises);
        return view('pages/kids/home');
    }

    public function intro()
    {
        $this->data['exercises']= cache()->get('exercises');
        $this->data['idExercises']= $_GET['idExercises'];
        return view('pages/kids/intro',$this->data);
    }

    public function feedback()
    {
        $this->data['exercises']= cache()->get('exercises');
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
        $model = model(ExerciseModel::class);
        $data = [
            'title' => ucfirst($page),// Capitalize the first letter
            'exercises' => $model->getExercises()
        ];

        return view('pages/kids/' . $page, $data);

    }


    }