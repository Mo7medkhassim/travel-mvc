<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\models\user;
use GUMP;
use MVC\core\helpers;
use MVC\core\Session;

class usercontroller extends controller
{

    public function __construct()
    {
        Session::start();
    }

    public function index()
    {

        $this->view('back/login', ['title' => 'Login']);
        
    }

    public function login()
    {
        $this->view('back/login', ['title' => 'Login']);
    }

    public function postlogin()
    {
        
        $data = GUMP::is_valid($_POST, [
            'username' => 'required', 'alpha_numeric',
            'password' => 'required'
        ]);
        
        if ($data == 1) {
            $user = new user();
            $data = $user->GetUser($_POST['username'], $_POST['password']);
            // $data =$data->username;

            session::Set('username', $data);
            helpers::redirect('adminpost/index');
            
        }
        // Session::Stop();
    }
}
