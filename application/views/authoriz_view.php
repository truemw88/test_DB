<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Token: <?= @$_COOKIE['token'] ?> </hr>
<form action="/authoriz/authoriz" method="post" >
    Авторизация<br>

    <input name="user" type="text" placeholder="Введите ваш логин" /><br>
    <input name="password" type="password" placeholder="Введите пароль"  /><br>
    <input type="submit"/><br>


</form>
</body>
</html>