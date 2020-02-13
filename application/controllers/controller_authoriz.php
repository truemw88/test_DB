<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "sql.php";

class Controller_authoriz extends Controller
{

    function action_authoriz_form()
    {
        $this->view->generate('authoriz_view.php', 'template_view.php');
    }

    function action_authoriz()
    {
         /* TODO:

         */


        $person = $this->getPerson();
        //de($person);
        if (empty($person)) {
            //de('dwad');
            echo "Аунтефикация не пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
            de('dwewqearr');
            echo '<a href="/authoriz/authoriz_form">Аутентификация</a>';
        } else {
          //  de('dwarr');
            echo "Аунтефикация пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
            $token = rand(1000000, 9999999) . rand(1000000, 9999999);
            //2. Если нейм и пароль совпал - генерируем случайный токен (аналог пропускного билета)


            //3. Этот токен записываем в БД
            $this->setPerson($token);

            //4. "Отдаём" токен пользователю - через куки
            setcookie("token", $token, time()+3600, "/");
            //de($token);



        }
    }

    public function getPerson()
    {
        return sql::select('persone', $_POST, $_POST);
    }

    public function setPerson($token)
    {
        return sql::update('persone', ['token' => $token]);
    }
}
