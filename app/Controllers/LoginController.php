<?php

namespace App\Controllers;

use Config\Database;
use PSpell\Config;

// use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function loginAuth()
    {
        $rules = [
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Email Required!',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password Required!',
                ],
            ]
        ];
        if ($this->validate($rules)) {
            $session = \Config\Services::session();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $db = \Config\Database::connect();
            $query = $db->table('signup');
            $query->where('email', $email);
            $results = $query->get()->getRowArray();
            if ($results) {
                $pass = $results['password'];
                $usertype = $results['user_type'];
                $verifypass = password_verify($password, $pass);
                if ($password == $verifypass) {
                    if($usertype=='admin'){
                        $session = session();
                    $session->set('isLoginUserAdmin', $email);
                    $session->set('isLoggedIn',true);
                    return redirect()->to(base_url('Auth/Dashboard'));
                    }else{
                        $session->setFlashdata('invalid', 'Invalid Users');
                        return view('login');
                    }
                } else {
                    $session->setFlashdata('passerror', 'Password is incorrect.');
                    return view('login');
                }
            } else {
                $session->setFlashdata('emailerror', 'Email does not exist.');
                return redirect()->back();
            }
        } else {
            $data['validation'] = $this->validator;
            return view('login', $data);
        }
    }
}
