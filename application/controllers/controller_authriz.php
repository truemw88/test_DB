<?php

class Controller_authoriz extends Controller{



    function action_authotiz_form(){

        $this->view->generate('authotiz_view.php', 'template_view.php');

    }
    function action_authotiz(){

        include $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."model_methods.php";
        //var_dump($_POST);
        // exit('ку222');
        $data = Page::getInfo('persone',$_POST['user'], $_POST['pass']);
        setcookie("user", $data['id'], time()+60*60*24*30, "/");
    }
}