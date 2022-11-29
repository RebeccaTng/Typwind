<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ExpertModel;
use App\Models\StudentModel;


class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    }

    public function loginAuth()
    {
        $session = session();
        $expertModel = new ExpertModel();
        $studentModel = new StudentModel();
        $email = $this->request->getVar('email');
/*        $password = $this->request->getVar('password');*/

        $data = $expertModel->where('email', $email)->first();
        $data2 = $studentModel->where('email', $email)->first();

        if($data){
            /*$pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){*/
                $ses_data = [
                    'id' => $data['id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/public/experthome');

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
                'id' => $data2['id'],
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
}