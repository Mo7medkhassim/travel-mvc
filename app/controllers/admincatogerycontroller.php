<?php

namespace MVC\controllers;


use MVC\core\controller;
use MVC\core\Session;
use MVC\models\user;


class admincatogerycontroller extends controller
{
    public function __construct()
    {   
        session::start();
        $userdata =  session::Get('username');
        if (empty($userdata)) {
            echo 'Sorry Page not Found!';die;
        }
    }
    

  
    public function index()
    {
        $this->view('back/catogery', ['title' => 'catogery']);
    }
    public function catogery()
    {
        $this->view('back/catogery', ['title' => 'catogery']);
    }
   
   
}
