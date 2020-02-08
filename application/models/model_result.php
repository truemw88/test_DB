<?php

Class Result extends Page{

    public static function InsertInfo($name)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `products`(`title`,`price`) VALUES (`$_POST[\'$value\,$_POST[\'price\']`) ';
        $result = $db->query($sql);

}

}