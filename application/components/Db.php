<?php


class Db
{
    public static function getConnection()
    {
        // Получаем параметры подключения из файла
        $paramsPath = $_SERVER['DOCUMENT_ROOT'] . '/application/components/db_params.php';
        if (!file_exists($paramsPath)) {
            throw new \Exception('Подключи файл на основе /application/components/db_params_example.php');
        }
        $params = include($paramsPath);

        // Устанавливаем соединение
        $db = new mysqli($params['host'], $params['user'], $params['password'], $params['dbname'], $params['dbport']);
        return $db;
    }
}