<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class NewUsers extends BaseController
{
    public function index()
    {
        
        $pagination = \Config\Services::pager();
        $session = \Config\Services::session();
        $check = $session->isLoginUserAdmin;
        if ($check) {
            $request = service('request');
            $searchData = $request->getGet();
            $search = "";
            $len='';
            if(isset($searchData) && isset($searchData['search'])){
                $search = $searchData['search'];
                $len = str_word_count($search);
            }
            $users = new UserModel();
            //Int Value Conditin
            if(filter_var($search,FILTER_VALIDATE_INT)){
                if($search == ''){
                    $paginateData = $users->paginate(5);
                  }else{
                    $paginateData = $users->select('*')
                    ->where('phone',$search)
                    ->orWhere('id', $search)
                    ->paginate(5);
                  }
                  $data = [
                    'users' => $paginateData,
                    'pager' => $users->pager,
                    'search' => $search
                  ];
                return view("auth/new_users", $data);
            }elseif(filter_var($search, FILTER_VALIDATE_EMAIL)){
                if($search == ''){
                    $paginateData = $users->paginate(5);
                  }else{
                    $paginateData = $users->select('*')
                    ->where('email', $search)
                    ->paginate(5);
                  }
                  $data = [
                    'users' => $paginateData,
                    'pager' => $users->pager,
                    'search' => $search
                  ];
                return view("auth/new_users", $data);
            }elseif($len==2){
                $firstName = explode(' ', trim($search ))[0];
                if($search == ''){
                    $paginateData = $users->paginate(5);
                  }else{
                    $paginateData = $users->select('*')
                        ->where('first_name', $firstName)
                        ->paginate(5);
                  }
                  $data = [
                    'users' => $paginateData,
                    'pager' => $users->pager,
                    'search' => $search
                  ];
                return view("auth/new_users", $data);
            }else{
                if($search == ''){
                    $paginateData = $users->paginate(5);
                  }else{
                    $paginateData = $users->select('*')
                        ->where('last_name', $search)
                        ->paginate(5);
                  }
                  $data = [
                    'users' => $paginateData,
                    'pager' => $users->pager,
                    'search' => $search
                  ];
                return view("auth/new_users", $data); 
            }
            
            //return
        } else {
            return redirect()->to(base_url('login'));
        }
    }
  public  function addNu(){
        return view("auth/new_add_users");
    }
    public  function storeData(){
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
        $file_ext = pathinfo($_FILES["file_image"]["name"], PATHINFO_EXTENSION);
        if($file_ext=="jpg"){
            $extension=".jpg";
        }elseif($file_ext=="png"){
            $extension=".png";
        }elseif($file_ext=="jpeg"){
            $extension=".jpeg";
        }
        $image=$this->request->getVar('fileimg');
        $img_arr_a = explode(";", $image);
        $img_arr_b = explode(",", $img_arr_a[1]);
        $data = base64_decode($img_arr_b[1]);
        $img_name = date("Y_m_d_h_m_s_mm").'_'.time().$extension;
        $fname=$this->request->getPost('fname');
        $lname=$this->request->getPost('lname');
        $gender=$this->request->getPost('gender');
        $dob=date('Y-m-d',strtotime($this->request->getVar('dob')));
        $email=$this->request->getPost('email');
        $phone=$this->request->getPost('phone');
        $designation=$this->request->getPost('designation');
        $password=password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);
        $conpassword=$this->request->getPost('conpassword');
        $imgPath="profile/".$img_name;
        
        $data=array(
            'first_name'=>$fname,
            'last_name'=>$lname,
            'gender'=>$gender,
            'dob'=>$dob,
            'email'=>$email,
            'phone'=>$phone,
            'designation'=>$designation,
            'password'=>$password,
            'confirm_pass'=>$conpassword,
            'img_name'=>$img_name,
            'img_path'=>$imgPath
        );
        $db = new UserModel();
        $result=$db->insert($data);
        if($result){
            file_put_contents('profile/'.$img_name, $data);
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Successfully Register');
            return redirect()->to(base_url('Auth/New_Add'));
        }
    }else {
        $data['validation'] = $this->validator;
        return view('auth/new_add_users', $data);
    }
}
}
