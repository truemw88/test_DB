<?php

class Controller_reg extends Controller {


    function action_index()
    {
        $persones = sql::select('persone');
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
        $add = sql::insert('persone',$_POST);


    }
}