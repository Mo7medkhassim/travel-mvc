<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\Session;
use MVC\models\backhome;
use MVC\core\helpers;

class adminhomecontroller extends controller
{
    public $userdata;

    public function __construct()
    {
        session::start();
        $this->userdata =  session::Get('username');
        // var_dump($pth);die;
        if (empty($this->userdata)) {
            echo 'Sorry Page not Found!';
            die;
        }
    }

    public function index()
    {
        var_dump($this->userdata);
        // var_dump($userdata);die;
        // $data = $this->userdata;
        $this->view('back/index', ['title' => 'home', 'data' => $this->userdata]);
    }

    public function home()
    {
        $this->view('back/home', ['title' => 'home', 'data' => $this->userdata]);
    }
    public function homedetails()
    {
        $data = backhome::selectAll();

        $this->view('back/homedetails', ['title' => 'homedetails', 'data' => $data]);
    }

    public function delete()
    {
        $id = $_GET['id'];;
        if (backhome::deleteRow($id)) {
            helpers::redirect('adminhome/homedetails');
        }
    }

    public function update()
    {
        $data = [];
        // var_dump($_FILES['img']);die;
        if (isset($_POST['update'])) {
            // check is user 
            // $useremail = $_SESSION['user'];
            // $userid = $_SESSION['userid'];
            $pth = "back/uploud/";

            //    recive the data
            $title = $_POST['title'];
            $discription = $_POST['discription'];
            // to access id from form data 
            $id = ['id' => $_POST['id']];
            $userId = $this->userdata->userId;
            
            // var_dump($id);die;
            // check image to uploud 

            // the path 
            if (!empty($_FILES['img']['name'])) {
                $imgname = uniqid() . $_FILES['img']['name'];
                $imgtmp = $_FILES['img']['tmp_name'];
                $position = strpos($imgname, ".");
                $fileextension = substr($imgname, $position + 1);
                $fileextension = strtolower($fileextension);
                move_uploaded_file($imgtmp, $pth . $imgname);

                $data = ['title' => $title, 'discription' => $discription, 'img' => $imgname, 'userId' => $userId];

            } else {

                $data = ['title' => $title, 'discription' => $discription, 'userId' => $userId];
                // var_dump($data);die;
            }

            $re = backhome::updatedata($data, $id);
            
            if ($data) {
                # code...
                helpers::redirect('adminhome/homedetails');
            }
        }
    }

    public function homeupdate()
    {
        // update data /Edite 

        $id = $_GET['id'];

        $data =  backhome::selectOne($id);
        
        $this->view('back/homeupdate', ['title' => 'homeupdate', 'data' => $data]);
    }

    public function homeAdd()
    {
        $error = "";

        if (isset($_POST['title'])) {
            // check is user 
            // $useremail = $_SESSION['user'];
            // $userid = $_SESSION['userid'];
            $pth = "back/uploud/";

            //    recive the data
            $title = $_POST['title'];
            $discription = $_POST['discription'];
            $userId = $_POST['userid'];

            // check image to uploud 
            $imgname = uniqid() . $_FILES['img']['name'];
            $imgtmp = $_FILES['img']['tmp_name'];
            $position = strpos($imgname, ".");
            $fileextension = substr($imgname, $position + 1);
            $fileextension = strtolower($fileextension);
            // the path 
            if (empty($imgname)) {
                $error =  "<small class='text-danger'>Please choose a file</small>";
            } else if (!empty($imgname)) {
                if (($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp")) {
                    $error  = "<span class='text-danger'>The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded</span>";
                } else if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")) {
                    if (move_uploaded_file($imgtmp, $pth . $imgname)) {
                        $data = ['title' => $title, 'discription' => $discription, 'img' => $imgname, 'userId' => $userId];
                        backhome::insertHomeData($data);

                        helpers::redirect('adminhome/homedetails');
                    }
                    //  var_dump($massage);
                }
            }
        }
    }
}
