<?php 

namespace MVC\models;

use MVC\core\model;

class backhome extends model{
    public $pregraph=[];

    public static function insertHomeData($pregraph){
      $data =   model::db()->insert('home_content', $pregraph);
      return $data;
    }

    public static function selectAll(){
      $data = model::db()->run("SELECT * FROM `home_content`")->fetchAll();
      return $data;
    }
    public static function updatedata($data,$id){
      $data = model::db()->update('home_content',$data,$id);
      return $data;
    }

    public static function selectOne($id){
      $data = model::db()->run("SELECT * FROM `home_content` WHERE id = ?", [$id])->fetch();
      return $data;
    }

    public static function deleteRow($id){
      $data = model::db()->delete('home_content',['id'=>$id]);
      return $data;
    }




}
