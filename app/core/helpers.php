<?php

namespace MVC\core;

class helpers{

    public static function redirect($path){
        var_dump($path);
        header("LOCATION:".DOMAIN_NAME.DS.$path);
    }

}