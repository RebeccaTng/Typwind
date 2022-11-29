<?php

namespace App\Controllers;

use App\Models\Students_model;
use App\Models\Teachers_model;

class RegistrationController extends \CodeIgniter\Controller
{
    public function signin()
    {
        helper(['form']);
        echo view('pages/registration/signin');
    }

    public function signup()
    {
        helper(['form']);
        $data = [];
        echo view('pages/registration/signup', $data);
    }

    public function loginAuth()
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
                'isLoggedIn' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('public/experts/homeContent');

            /*}*//*else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/public/signin');
            }*/
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
                'isLoggedIn' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/public/studenthome');

            /*}*//*else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/public/signin');
            }*/
        }

        else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/public/signin');
        }
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'firstname'          => 'required|min_length[2]|max_length[50]',
            'lastname'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
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
            return redirect()->to('/public/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }
}