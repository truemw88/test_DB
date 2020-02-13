<?php


class Controller_Main extends Controller
{
    function action_index()
    {
        $products = MySQL::select('product', [], []);
        if ($products === false) {

        }

        $this->view->generate(
             'main_view.php',
            'main_view.php',
            ['title' => 'Продукты', 'objects' => $products]
        );
    }

    function action_add_record_form()
    {
        $this->view->generate('addrecord_view.php', 'template_view.php');
    }

    function action_add_record()
    {

        $product = new Product_Model();// {title: null, price: null}
        $product->load($_POST);// {title: qweqwe, price: 120}
        $product->save(); //{id: 5, title: qweqwe, price: 120}

        $add = MySQL::select('product', $_POST);
    }

    function action_update_record_form()
    {
        $product = MySQL::select('product', [], ['id' => $_GET['id']]);
//        de($product);
//        $product = new Product_Model();
//        $product->find(['id' => $_GET['id']]);
//        $this->view->generate('addrecord_view.php', 'template_view.php');
    }

    function action_update_record()
    {
        $product = new Product_Model();// {title: null, price: null}
        $product->find(['id' => $_POST['id']]); // {title: qweqwe, price: 120}
        $product->load($_POST);
        $product->save(); //{id: 5, title: qweqwe, price: 120}

        $add = MySQL::select('product', $_POST);
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