<?php

class Controller_reg extends Controller {


    function action_add_pers_form(){

        $this->view->generate('reg_view.php', 'template_view.php');

    }
    function action_add_pers(){

//        $name = $_POST['user'];
//        $mail = $_POST['mail'];
//        $password = $_POST['pass'];
//
//            function clean($value =""){
//
//                $value = trim($value);
//                $value= stripslashes($value);
//                $
//            }
        include $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."model_methods.php";
        //var_dump($_POST);
        // exit('ку222');
        $add = Page::InsertInfo('persone',$_POST);


    }
}