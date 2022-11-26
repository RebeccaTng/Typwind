<?php

namespace App\Controllers;

class ExpertController extends BaseController
{
    public function home()
    {
        $data['title'] = "Home";
        return view('pages/experts/home_content', $data);
    }


}
