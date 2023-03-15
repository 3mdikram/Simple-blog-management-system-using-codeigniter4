<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = \Config\Database::connect();
            $query = $db->table('signup');
            $query->where('email', $check);
            $results = $query->get()->getRowArray();
            return view("auth/profile", $results);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function profileUpdate()
    {
        $data = [
            'first_name' => $this->request->getPost('fname'),
            'last_name' => $this->request->getPost('lname'),
            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        $db = \Config\Database::connect();
        $builder = $db->table("signup");
        $builder->where('email', $check);
        $builder->update($data);
        $session->setFlashdata('profile_upd', 'Successfully Updated!');
        return redirect()->to(base_url('Auth/Profile'));
    }
    public function passwordUpdate()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        $db = \Config\Database::connect();
        $builder = $db->table("signup");
        $builder->where('email', $check);
        $results = $builder->get()->getRowArray();
        $pass = $results['password'];
        if (password_verify($this->request->getVar('currentpass'), $pass)) {
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'confirm_pass' => $this->request->getPost('conpass')
            ];
            $builder = $db->table("signup");
            $builder->where('email', $check);
            $builder->update($data);
            $session->setFlashdata('profile_upd', 'Successfully Updated!');
            return redirect()->to(base_url('Auth/Profile'));
        } else {
            $session->setFlashdata('profile_upd', 'Invalid Current Password!');
            return redirect()->to(base_url('Auth/Profile'));
        }
    }
    public function updateFile(){
        $file = $this->request->getFile('file_img');
        $name = $file->getRandomName();
        $dbpath="profile/".$name;
        $data=array(
            'img_name' => $name,
            'img_path' => $dbpath
        );
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        //Get Old Image Name For Delete
        $umodel=new UserModel();
        $umodel->where('email',$check);
        $res = $umodel->get()->getRowArray();
        $userId = $res['img_path'];
        $db = \Config\Database::connect();
        $model = $db->table("signup");
        $model->where('email', $check);
        $result=$model->update($data);
        if($result){
            $file->move('profile', $name);
            unlink($userId);
            echo json_encode(array("status" => TRUE));
        }
    }
}
