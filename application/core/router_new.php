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
        $controller_name = 'reg';
        $action_name = 'add_pers_form';

        $routers = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']); // РАЗДЕЛИЛИ ЮРЛЬ

        if (!empty($routers[1])) {
            $controller_name = $routers[1];
        }

        if (!empty($routers[2])) {
            $action_name = $routers[2];
        }

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
        //  de($action);
//        if (self::checkAuth() == true) {
        if (method_exists($controller, $action)) {
            // вызываем действие контроллера

            $mass = self::checkInDb();
            if ($mass == $_COOKIE['token']) {
                $controller->$action();
            } else {
                $cont1 = new Controller_authoriz;
                $cont1->action_authoriz_form();
                echo 'Неверный токен';
            }
            //$controller->$action();
            /* if(is_object($res)){
                 $class = get_class_methods($action);
                 $res = $action;
                 $getObj = print_r(get_class_methods($action), true);

             }else{
                 $class= $action;
                 $getObj = null;
             }
             var_dump($getObj);
 */
        } else {
            // здесь также разумнее было бы кинуть исключение
            throw new Exception('[ERROR! Action ' . $controller_file . ' ' . $action . ' IS NOT EXSIST! ]<hr/>');
        }
//        }else{
//
//            $controller->$action();
//            echo "Аунтефикация не пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
//        }

    }

    ////5. Перед любым действием (action) кроме логина и обработчика формы логина - нужно проверить есть ли у поьзователя доступ.
    static function checkAuth()
    {
        $_COOKIE['token'];
        // self::checkInDb;


        //  de($_COOKIE['token']);
//        if (isset($_COOKIE['token'])) {
//            // de($_COOKIE['token']);
//            $tok = $_COOKIE['token'];
//            $access = self::checkInDb($_COOKIE['token']);
//            if ($access == $_COOKIE['token']) {
//                echo 'токен есть';
//                return true;
//            } else {
//                echo 'токента нет';
//                return false;
//            }
//        }
    }

    static function checkInDb()
    {
        //de('dwadwa');
        $access = sql::select('persone', $_POST, $_POST);
        return $access[0]['token'];
        //de($access[0]['token']);
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}