<?php

namespace App\Controllers;

class expertController extends BaseController
{
    public function home()
    {
        $data['title'] = "Home";
        return view('pages/experts/home_content', $data);
    }
    public function Design()
    {
        $data['title'] = "testing CSS design";
        return view('pages/css_testing/css_example', $data);
    }
}
