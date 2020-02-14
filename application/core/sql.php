<?php

class sql
{

    /**
     * @param $table
     * @param $fieldValue массив ['title'=>'батарея для телефона', 'price'] батарея для телефона
     */

    static function each($columnValue)
    {
        $condition = [];
        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" , ", $condition);
    }

    public static function insert($table, $fieldValue)
    {
        //de($fieldValue);
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

        $sql = "INSERT INTO $table (" . $fields1 . ") VALUES (" . $values1 . ")";
        $query = $db->query($sql);


        if ($query) {
            $db->insert_id;
            return $db->insert_id;
        } else {
            return false;
        }
    }

    public static function select($table, $columnValue = [])
    {
        $db = Db::getConnection();

        // $condition = self::each($columnValue);

        $condition = [];

        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" ", $condition);


        $sql = "SELECT * FROM $table ";
        $sql .= "WHERE 1=1 " . $condition;
        $result = $db->query($sql);

        //  de($sql);
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

    public static function update($table, $fieldValue = null, $columnValue = null)//, $columnValue = null
    {
        $db = Db::getConnection();

//        if($fieldValue == $columnValue
//            || $fieldValue == null
//            || $columnValue == null ){
//            $columnValue = $fieldValue;
//        }

        $values = [];
        foreach ($fieldValue as $key => $value) {
            if (is_numeric($value)) {
                $values[] = $key . " = " . $value;
            } else {
                $values[] = $key . " = '" . $value . "'";
            }
        }
        $values = implode(" , ", $values);

        $condition = [];
        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" " , $condition);

        $sql = "UPDATE $table SET " . $values . "  WHERE 1=1 " . $condition;
        $result = $db->query($sql);
        if ($result == false) {
            return false;
        } else {
            return true;
        }

    }

    public static function delete($table, $columnValue = null)
    {
        $db = Db::getConnection();

        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" , ", $condition);

        $sql = "DELETE FROM $table WHERE 1 = 1 " . $condition;
        $result = $db->query($sql);

    }
}