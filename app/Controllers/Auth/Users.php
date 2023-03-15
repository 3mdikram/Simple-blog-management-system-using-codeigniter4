<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Users extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = new UserModel();
            $db->where('email !=', $check);
            $db->select('*');
            $data['results'] = $db->findAll();
            return view("auth/show_users", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function updateUserData($id)
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = new UserModel();
            $db->where('id', $id);
            $data['results'] = $db->get()->getRowArray();
            return view("auth/update_users", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function userProfileDataUpdate()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $data = [
                'first_name' => $this->request->getPost('fname'),
                'last_name' => $this->request->getPost('lname'),
                'gender' => $this->request->getPost('gender'),
                'dob' => date("Y-m-d", strtotime($this->request->getVar('dob'))),
                'phone' => $this->request->getPost('phone'),
                'designation' => $this->request->getPost('designation'),
                'updated_at' => $this->request->getPost('updated_at'),
            ];
            $db = \Config\Database::connect();
            $builder = $db->table("signup");
            $builder->where('id', $this->request->getPost('id'));
            $builder->update($data);
            echo json_encode(array("status" => TRUE));
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function usersDeleted()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $user_id = $this->request->getPost('id');
            $db = new UserModel();
            $db->where('id', $user_id);
            $db->delete();
            echo json_encode(array("status" => TRUE));
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}
