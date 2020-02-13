<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "sql.php";
include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_product.php";

class Controller_Main extends Controller
{
    function action_index()
    {
        $product = new Model_Product();
        $products = $product->find();
        //$products = SQL::select('product', []);

        if ($products === false) {

        }

        $this->view->generate(
            'main_view.php',
            'main_view.php',
            ['title' => 'Продукты', 'objects' => $products]
        );
    }

    function action_add_record_form()//insert
    {
        $this->view->generate('addrecord_view.php', 'template_view.php');
    }

    function action_add_record()//insert
    {

        //de($_POST);
        $product = new Model_Product();// {title: null, price: null}

        $product->load($_POST);// {title: qweqwe, price: 120}
        $product->save();
        //de($product->load($_POST)); загрузил и выдал ид
        // $product->save(); //{id: 5, title: qweqwe, price: 120}
    }




    function action_update_record_form()
    {

       // $product = SQL::select('product', ['id' => $_GET['id']]);
        $product = new Model_Product();
        $mass = $product->find(['id' => $_GET['id']]);
        $this->view->generate('update_view.php',
            'template_view.php', $mass[0]);
    }

    function action_update_record()
    {
        $product = new Model_Product();// {title: null, price: null}

        $mass=$product->find(['id' => $_POST['id']]);// {title: qweqwe, price: 120}
        $product->load($mass[0]);
        $product->save($_POST);
        //de($product->save($_POST));
        //$product->save(); //{id: 5, title: qweqwe, price: 120}


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