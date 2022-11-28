<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ExpertModel;

class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
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
            $userModel = new ExpertModel();
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