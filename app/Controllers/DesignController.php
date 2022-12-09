<?php

namespace App\Controllers;

class DesignController extends BaseController
{

    public function view($page = 'css_example')
    {
        if (! is_file(APPPATH . 'Views/pages/css_testing/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        setcookie("englishActive", 'not active', time()+3600000000000, "/");
        setcookie("nederlandsActief", 'active', time()+3600000000000, "/");
        
        return view('/pages/css_testing/' . $page);
    }
}