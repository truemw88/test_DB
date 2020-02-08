<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/4/2020
 * Time: 1:22 PM
 */

class Controller_Main extends Controller
{
    function action_index()
    {
        //exit('ку');
        $this->view->generate('main_view.php', 'template_view.php');
    }


    function action_add_record_form()
    {
        //$data = $this->model->get_data();
       // exit('ку2');
        $this->view->generate('addrecord_view.php', 'template_view.php');

    }


    function action_add_record()
    {
        include $_SERVER['DOCUMENT_ROOT']."\application\models\model_methods.php";
        //var_dump($_POST);
      // exit('ку222');
       $add = Page::InsertInfo('product',$_POST);


    }
    //TODO разработать автозагрузчик классов


//    function __construct()
//    {
//        $this->model = new Model_Portfolio();
//        $this->view = new View();
//    }
//
//    function action_index()
//    {
//        $data = $this->model->get_data();
//        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
//    }
}