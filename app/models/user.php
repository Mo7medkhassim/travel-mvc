<?php

namespace MVC\models;

use MVC\core\model;

class user extends model{

    public function GetAllUsers(){
        $data =  model::db()->rows("SELECT * FROM userdata"); 
        return $data;
    }

    public function GetUser($username,$password){
        $data =  model::db()->row("SELECT * FROM userdata Where `username` = ? && `password` = ? ",[$username,$password]); 
        return $data;
    }

   
}