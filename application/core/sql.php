<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "sql.php";

class Controller_reg extends Controller {


    function action_index()
    {
        $persones = SQL::select('persone');
        if ($persones === false) {

        }
        $this->view->renderObjects(
            ['title' => 'Персоны', 'objects' => $persones]
        );
    }

    function action_add_pers_form()
    {
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
        $add = SQL::insert('product',$_POST);


    }
}