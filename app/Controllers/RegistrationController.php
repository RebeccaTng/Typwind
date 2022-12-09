<?php

namespace App\Controllers;

use App\Models\Students_model;
use App\Models\Teachers_model;

class RegistrationController extends \CodeIgniter\Controller
{

    public function expertLogin()
    {
        helper(['form']);
        echo view('pages/registration/expertLogin');
    }

    public function studentLogin()
    {
        helper(['form']);
        echo view('pages/registration/studentLogin');
    }

    public function register()
    {
        helper(['form']);
        $data = [];
        echo view('pages/registration/register', $data);
    }


    public function welcome()
    {
        helper(['form']);
        $data = [];

/*        //Clearing all of the previously declared cookies if necesarry with uncommenting this line of code :)
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }*/

        //Setting the initial language Cookie
        setcookie("englishActive", 'not active', time()+3600, "/");
        setcookie("nederlandsActief", 'active', time()+3600, "/");

        echo view('pages/registration/welcome', $data);
    }



    public function loginExpert()
    {
        $session = session();
        $expertModel = new Teachers_model();
        $studentModel = new Students_model();
        $email = $this->request->getVar('email');
        /*        $password = $this->request->getVar('password');*/

        $data = $expertModel->where('email', $email)->first();
        $data2 = $studentModel->where('email', $email)->first();

        if($data){
            /*$pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){*/
            $ses_data = [
                'id' => $data['idTeachers'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'isLoggedIn' => TRUE,
                'isStudent' => FALSE
            ];
            $session->set($ses_data);
            return redirect()->to('experts/home');

            /*}*//*else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/public/signin');
            }*/
        }

        else if(!$data & $data2){
            $session->setFlashdata('msg', 'This is a student email.');
            return redirect()->to('/registration/expertLogin');
        }

        else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/registration/expertLogin');
        }
    }

    public function loginStudent()
    {
        $session = session();
        $expertModel = new Teachers_model();
        $studentModel = new Students_model();
        $email = $this->request->getVar('email');
        /*        $password = $this->request->getVar('password');*/

        $data = $expertModel->where('email', $email)->first();
        $data2 = $studentModel->where('email', $email)->first();

        if($data & !$data2){
            $session->setFlashdata('msg', 'This is an expert email.');
            return redirect()->to('/registration/studentLogin');
        }

        else if($data2){
            /*$pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){*/
            $ses_data = [
                'id' => $data2['idStudents'],
                'firstname' => $data2['firstname'],
                'lastname' => $data2['lastname'],
                'email' => $data2['email'],
                'isLoggedIn' => TRUE,
                'isStudent' => TRUE
            ];
            $session->set($ses_data);

            return redirect()->to('/kids/home');
        }

        else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/registration/studentLogin');
        }
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'firstname'          => 'required|min_length[2]|max_length[50]',
            'lastname'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[teachers.email]',
            /*            'password'      => 'required|min_length[4]|max_length[50]',*/
            /*            'confirmpassword'  => 'matches[password]'*/
        ];

        if($this->validate($rules)){
            $userModel = new Teachers_model();
            $data = [
                'firstname'     => $this->request->getVar('firstname'),
                'lastname'     => $this->request->getVar('lastname'),
                'email'    => $this->request->getVar('email'),
                /*                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)*/
            ];
            $userModel->save($data);
            return redirect()->to('/registration/welcome');
        }else{
            $data['validation'] = $this->validator;
            echo view('/pages/registration/register', $data);
        }
    }
}