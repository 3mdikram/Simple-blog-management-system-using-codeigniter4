<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Tdolist;
use App\Models\UserModel;

class ToDoList extends BaseController
{
    public function index()
    {
        $check = $this->session->isLoginUserAdmin;
        if ($check) {
            // ToDoList
            $tdlmodel = new Tdolist();
            $perPage =3;
            $tdlmodel->select('*');
            $tdlmodel->orderBy('id', 'asc');
            $result= $tdlmodel->paginate($perPage);
            $data = [
                'result' => $result,
                'pager' => $tdlmodel->pager
              ];
            return view("auth/todolist", $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }
    public function AdData()
    {
        $data = [
            'name' => $this->request->getPost('uname'),
            'item' => $this->request->getPost('itemName'),
            'issue_by' => $this->request->getPost('issued'),
            'created_at' => date('Y-m-d', strtotime($this->request->getVar('date'))),
        ];
        $AddModel = new Tdolist();
        $AddModel->insert($data);
        return redirect()->to('Auth/ToDoList');
    }
    public function deleteToDo($id)
    {
        $del = new Tdolist();
        $del->where('id', $id);
        $del->delete();
        return redirect()->to('Auth/ToDoList');
    }
}
