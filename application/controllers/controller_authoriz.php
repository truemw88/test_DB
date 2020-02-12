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
         5. Перед любым действием (action) кроме логина и обработчика формы логина - нужно проверить есть ли у поьзователя доступ.
         */

        //1. Получаем $person = Page::GetInfo('persone', ['username' => $user, 'pwd' => $pwd]); if ($person == false) {Не аутентифицированы} else {...}
        $person = $this->getPerson();

        if (empty($person)) {
            echo "Аунтефикация не пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
        } else {
            echo "Аунтефикация пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";

            //2. Если нейм и пароль совпал - генерируем случайный токен (аналог пропускного билета)
            $token = rand(1000000, 9999999) . rand(1000000, 9999999);

            //3. Этот токен записываем в БД
            $result = $this->setPerson($token);

            //4. "Отдаём" токен пользователю - через куки
            setcookie("token", $token);
        }
    }

    public function getPerson()
    {
        return SQL::select('persone', $_POST, $_POST);
    }

    public function setPerson($token)
    {
        return SQL::update('persone', ['token' => $token] ,$_POST);
    }
}
