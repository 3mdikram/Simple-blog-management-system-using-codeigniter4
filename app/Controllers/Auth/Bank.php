<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\BankModel;
use CodeIgniter\I18n\Time;

class Bank extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = \Config\Database::connect();
            $builder = $db->table("signup");
            $builder->where('email', $check);
            $results = $builder->get()->getRowArray();
            $userId = $results['id'];

            $db = new BankModel();
            $db->where('users_id', $userId);
            $data['results'] = $db->findAll();
            return view("auth/bank", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function AddNewBank()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = \Config\Database::connect();
            $builder = $db->table("signup");
            $builder->where('email', $check);
            $results = $builder->get()->getRowArray();
            $userId = $results['id'];
            //Add Bank Data
            $bankname = $this->request->getPost('bankname');
            $account_no = $this->request->getPost('accountno');
            $ifsc_code = $this->request->getPost('ifscode');
            $data = array(
                'bank_name' => $bankname,
                'ifsc_code' => $ifsc_code,
                'account_no' => $account_no,
                'users_id' => $userId,
                'created_at' => Time::now()
            );
            $insertdata = $db->table("bank");
            $insertdata->insert($data);
            echo json_encode(array("status" => TRUE));
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function UpdateBankData()
    {

        $bankname = $this->request->getPost('bankname');
        $account_no = $this->request->getPost('accountno');
        $ifsc_code = $this->request->getPost('ifscode');
        $bank_id = $this->request->getPost('bankids');
        $data = array(
            'bank_name' => $bankname,
            'ifsc_code' => $ifsc_code,
            'account_no' => $account_no,
            'updated_at' => Time::now()
        );
        $db = new BankModel();
        $db->where('id', $bank_id);
        $db->set($data);
        $db->update();
        echo json_encode(array("status" => TRUE));
    }
    public function BankDeleted()
    {
        $bank_id = $this->request->getPost('id');
        $db = new BankModel();
        $db->where('id', $bank_id);
        $db->delete();
        echo json_encode(array("status" => TRUE));
    }
}
