<?php

class Page
{

    /**
     * @param $table
     * @param $fieldValue массив ['title'=>'батарея для телефона', 'price'] батарея для телефона
     */
    public static function InsertInfo($table, $fieldValue)
    {
        foreach ($fieldValue as $key => $value) {
            if (is_numeric($value)) {
                $values[] = $value;
            } else {
                $values[] = "'" . $value . "'";
            }
            $fields[] = $key;

        }
        $values1 = implode(" , ", $values);
        $fields1 = implode(" , ", $fields);
        $db = Db::getConnection();

        $sql = "INSERT INTO $table (" . $fields1 . ")
                VALUES (" . $values1 . ")";
        print_r($sql);
        $result = $db->query($sql);
    }

    public static function GetInfo($table, $fieldValue = null)
    {
        $db = Db::getConnection();
        /*foreach ($fieldValue as $key => $value) {
            if (is_numeric($value)) {
                $values[] = $value;
            } else {
                $values[] = "'" . $value . "'";
            }
            $fields[] = $key;

        }
        $values1 = implode(" , ", $values);
        */

        $sql = "SELECT * FROM $table ";
        $sql .= "WHERE 1=1";

        $result = $db->query($sql);

        $rows = [];
        if ($result == false) {
            return false;
        } else {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $rows[] = $row;
            }
            return $rows;
        }
    }

    public static function UpdateInfo($id, $name)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `products` SET name= WHERE id=';
        $result = $db->query($sql);

    }

    public static function DeleteInfo($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM `table` WHERE id=';
        $result = $db->query($sql);

    }
}