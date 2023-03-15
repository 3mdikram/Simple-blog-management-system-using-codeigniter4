<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class PostNews extends BaseController
{
    public function index()
    {
        helper('form');
        $data=[
            'title'=>'New Post',
            'n_f'=>[
                'f_open'=>form_open('/contact'),
                'n_title'=>form_input(['type'=>'text','class'=>'form-control','name'=>'newstitle','placeholder' => 'News Title','value'=>$this->request->getPost('newstitle')]),
                'n_message'=>form_textarea(['id'=>'compose-textarea','class'=>'form-control','name'=>'newsmessage','placeholder' => 'Write here..']),
                'f_close'=>form_close()
            ]
        ];
       return view('auth/post_news',$data);
    }
}
