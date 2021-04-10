<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\Session;
use MVC\models\user;
use GUMP;

class homecontroller extends controller
{
   
    public function index()
    {
        $user = new user();
        $user = $user->GetAllUsers();
       
        $this->view('home/index', ['title' => 'home','data'=> $user]);
    }

   

    
    
    
}
