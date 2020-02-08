<?php


class Db
{
    public static function getConnection()
    {
        // Получаем параметры подключения из файла
        $paramsPath = 'application/components/db_params.php';
        $params = include($paramsPath);

        // Устанавливаем соединение
        $db = new mysqli($params['host'], $params['user'], $params['password'], $params['dbname']);
        return $db;
    }
}