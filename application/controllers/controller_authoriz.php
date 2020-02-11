<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_methods.php";

class Controller_authoriz extends Controller
{

    function action_authoriz_form()
    {
        $this->view->generate('authoriz_view.php', 'template_view.php');
    }

    function action_authoriz()
    {
        /* TODO:
            1. Получаем $person = Page::GetInfo('persone', ['username' => $user, 'pwd' => $pwd]); if ($person == false) {Не аутентифицированы} else {...}
            2. Если нейм и пароль совпал - генерируем случайный токен (аналог пропускного билета)
            3. Этот токен записываем в БД
            4. "Отдаём" токен пользователю - через куки
            5. Перед любым действием (action) кроме логина и обработчика формы логина - нужно проверить есть ли у поьзователя доступ.
         */
        $data = Page::getInfo('persone', $_POST);
        setcookie("user", $data['id'], time() + 60 * 60 * 24 * 30, "/");



        $password = $data['pass'];
        $user = $data['user'];

        $person = Page::GetInfo('persone',['user'=> $user, 'pass'=>$password]);

        if (false && $person == false){

            echo "Аунтефикация не пройдена";

        } else {
            echo 'ok';
            $token = rand(1000000, 9999999).rand(1000000, 9999999);

        }

    }
}
