<?php

namespace App\Controllers;

class ExpertController extends BaseController
{
/*    public function home()
    {
        $data['title'] = "Home";
        return view('pages/experts/home_content', $data);
    }*/

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/experts/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        return view('/pages/experts/' . $page);
    }


}
