<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/4/2020
 * Time: 12:17 PM
 */


Class Route
{

    static function start()
    {

        // по умолчанию
        $controller_name = 'main';
        $action_name = 'index';

        $routers = explode('/', $_SERVER['REQUEST_URI']);// РАЗДЕЛИЛИ ЮРЛЬ

        if (!empty($routers[1])) {

            $controller_name = $routers[1];

        }

        if (!empty($routers[2])) {

            $action_name = $routers[2];

        }

//        var_dump($routers);
//        exit();
        // добавил префикс
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_name = 'Model_' . $controller_name;

        //подцепил модель
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = $_SERVER['DOCUMENT_ROOT'] . "/application/controllers/" . $controller_file;

        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            throw new Exception('[ERROR! Controller ' . $controller_file . '. IS NOT EXSIST! ]<hr/>');
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        // var_dump($controller);
        //var_dump($action);
        //exit;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            throw new Exception('[ERROR! Action ' . $controller_file . ' ' . $action . ' IS NOT EXSIST! ]<hr/>');
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }


}