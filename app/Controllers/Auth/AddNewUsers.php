<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class AddNewUsers extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            return view("auth/add_new_users");
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function addNewUsers()
    {
        $rules = [
            'fname' => [
                'rules'  => 'required|max_length[50]',
                'errors' => [
                    'required' => 'First Name Required!',
                ],
            ],
            'lname' => [
                'rules'  => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Last Name Required!',
                ],
            ],
            'gender' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Gender Required!',
                ],
            ],
            'dob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'DoB Required!',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Required!',
                ],
            ],
            'phone' => [
                'rules'  => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Phone Required!',
                ],
            ],
            'designation' => [
                'rules'  => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Designation Required!',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password Required!',
                ],
            ],
            'conpassword' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Confirm Password Required!',
                ],
            ]
        ];
        if ($this->validate($rules)) {
            $blanpname = "blank_profiles.jpg";
            $blnkpath = "profile/blank_profile/" . $blanpname;
            $data = [
                'first_name' => $this->request->getPost('fname'),
                'last_name' => $this->request->getPost('lname'),
                'gender' => $this->request->getPost('gender'),
                'dob' => date('Y-m-d', strtotime($this->request->getVar('dob'))),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'designation' => $this->request->getPost('designation'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'confirm_pass' => $this->request->getVar('conpassword'),
                'img_name' => $blanpname,
                'img_path' => $blnkpath,
                'created_at' => Time::now()
            ];
            $db = new UserModel();
            $db->insert($data);
            echo json_encode(array("status" => TRUE));
        } else {
            $data['validation'] = $this->validator;
            return view('auth/add_new_users', $data);
        }
    }
}
