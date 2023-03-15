<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserSalary;
use CodeIgniter\I18n\Time;

class Salary extends BaseController
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
            return view("auth/salary", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function showUserSalary($id)
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db=new UserSalary();
            $db->select('*');
            $db->where('user_id',$id);
            $data['results']=$db->findAll();
            return view("auth/view_salary", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function addNewSalary()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            return view("auth/add_salary");
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function salaryDataAddeDb()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $rules = [
                'umail' => [
                    'rules'  => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Email Id Required!',
                    ],
                ],
                'bankname' => [
                    'rules'  => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Bank Name Required!',
                    ],
                ],
                'accountno' => [
                    'rules'  => 'required|numeric|max_length[11]',
                    'errors' => [
                        'required' => 'Account No Required!',
                    ],
                ],
                'ifscode' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'IFSC Code Required!',
                    ],
                ],
                'amount' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Amount Required!',
                    ],
                ],
                'paidmode' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Paid Mode Required!',
                    ],
                ]
            ];
            if ($this->validate($rules)) {
                $db = \Config\Database::connect();
                $query = $db->table('signup');
                $query->where('email', $this->request->getVar('umail'));
                $results = $query->get()->getRowArray();
                if($results){
                    $uId = $results['id'];
                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $lenth=substr(str_shuffle($characters),0,20);
                    $data = [
                    'bank_name' => $this->request->getPost('bankname'),
                    'ifsc_code' => $this->request->getPost('ifscode'),
                    'account_no' => $this->request->getPost('accountno'),
                    'amount' => $this->request->getPost('amount'),
                    'paid_mode' => $this->request->getPost('paidmode'),
                    'ref_no' =>$lenth,
                    'paid_date' => date('Y-m-d H:i:s'),
                    'user_id' =>$uId,
                    'created_at' =>date('Y-m-d H:i:s')
                    
                    
                ];
                $db = new UserSalary();
                $db->insert($data);
                echo 1;
                }else{
                    echo 2;
                }
            } else {
                $data['validation'] = $this->validator;
                return view('auth/add_salary', $data);
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}