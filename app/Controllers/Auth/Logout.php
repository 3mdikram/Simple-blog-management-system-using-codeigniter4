<?php

namespace App\Controllers\Auth;
use Config\Services;
use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        $session =Services::session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}
