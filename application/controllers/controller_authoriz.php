<?php

class Controller_authoriz extends Controller
{

    function action_authoriz_form()
    {
        $this->view->generate('authoriz_view.php', 'template_view.php');
    }

    function action_authoriz()
    {
        $person = $this->getPerson();

        if (empty($person)) {
            echo "Аунтефикация не пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
            echo '<a href="/authoriz/authoriz_form">Аутентификация</a>';
        } else {

            //2. Если нейм и пароль совпал - генерируем случайный токен (аналог пропускного билета)
            $token = rand(1000000, 9999999) . rand(1000000, 9999999);

            //3. Этот токен записываем в БД
            $this->setPerson($token);
            //de($this->setPerson($token));
            //4. "Отдаём" токен пользователю - через куки
            setcookie("token", $token, time()+3600, "/");

            echo "Аунтефикация пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
        }
    }

    public function getPerson()
    {
        return sql::selectOne('persone', $_POST);
    }

    public function setPerson($token)
    {
        return sql::update('persone', ['token' => $token]);
    }
}
