<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\helpers;
use MVC\core\Session;
use MVC\models\user;

class adminpostcontroller extends controller
{
    // public $userdata = [];
    public function __construct()
    {   
        session::start();
        
        $userdata =  session::Get('username');
        
        if (empty($userdata)) {
            echo 'Sorry Page not Found!';
            helpers::redirect('user');
        }
    }
    
    public function index()
    {    
        
        $this->view('back/index', ['title' => 'index']);
    }

  

    public function blog()
    {
        $this->view('back/blog', ['title' => 'Blog']);
    }

    public function contact()
    {
        $this->view('back/contact', ['title' => 'Contact']);
    }

    public function archive()
    {
        $this->view('back/archive', ['title' => 'Archive']);
    }
}
