<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\Session;
use MVC\models\user;
use MVC\models\backhome;
use GUMP;

class homecontroller extends controller
{
    public function index()
    {
        $data = backhome::selectAll();
        // var_dump($data);die;
        $user = new user();
        $user = $user->GetAllUsers();

        $this->view('home/index', ['title' => 'home', 'data' => $user, 'post'=>$data]);
    }
}
