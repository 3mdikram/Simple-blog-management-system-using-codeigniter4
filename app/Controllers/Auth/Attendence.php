<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserAttendence;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Attendence extends BaseController
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
            return view("auth/show_attendence", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function userAddAttendece()
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        $uMailId = $this->request->getPost('email');
        if ($check) {
            $db = \Config\Database::connect();
            $query = $db->table('signup');
            $query->where('email', $uMailId);
            $results = $query->get()->getRowArray();
            if ($results) {
                $uId = $results['id'];
                //Check Start Attendence
                $model = new UserAttendence();
                $model->where('user_id', $uId);
                $modrest = $model->get()->getRowArray();
                if ($modrest) {
                    $crtdate = $modrest['created_at'];
                    $update = $modrest['updated_at'];
                    if($update!=NULL){
                        echo 3;
                    }
                    if ($crtdate != NULL) {
                        $data = [
                            'work_endtime' =>date('H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];
                        $db = new UserAttendence();
                        $db->where('user_id',$uId);
                        $db->set($data);
                        $db->update();

                        echo 1;
                    }
                } else {
                    $data = [
                        'user_id' => $uId,
                        'work_stime' => date('H:i:s'),
                        'current_date' => date('Y-m-d H:i:s'),
                        'created_at' => Time::now()
                    ];
                    $db = new UserAttendence();
                    $db->insert($data);
                    echo  1;
                }
            } else {
                echo 2;
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function userAttendetails($id)
    {
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $db = new UserAttendence();
            $db->where('user_id', $id);
            $db->select('*');
            $data['results'] = $db->findAll();
            return view("auth/show_attend_details", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}
