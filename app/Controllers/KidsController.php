<?php

namespace App\Controllers;

use App\Models\ExerciseModel;

class KidsController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/kids/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $model = model(ExerciseModel::class);
        $data = [
            'title' => ucfirst($page),// Capitalize the first letter
            'exercises'=> $model->getExercises()
        ];

        return view('templates/header', $data)
            . view('templates/side_nav_bar')
            . view('pages/kids/' . $page,$data)
            . view('templates/footer');
    }
}