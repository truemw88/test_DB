<?php

class Page
{
    /**
     * @param $table
     * @param $fieldValue массив ['title'=>'батарея для телефона', 'price'] батарея для телефона
     */
    public static function InsertInfo($table, $fieldValue)
    {
        // $values1 = implode(",", $values);
        //var_dump($values);ghjgv
        //$values = '';
//        $fields = '';

        // VALUES ('John', 'Doe', 'john@example.com')"
//        foreach ($fieldValue as $key => $value){
//            $values .=',`'.$value.'`' ;
//            //$fields .='".$key."' ;
//            var_dump($values);
//        }

        //var_dump($values);
        //var_dump($fields);
        //var_dump($_POST['title']);
        // var_dump($fieldValue);

        foreach ($fieldValue as $key => $value) {
            if (is_numeric($value)) {
                $values[] = $value;
            } else {
                $values[] = "'" . $value . "'";
            }
            $fields[] = $key;
            //var_dump($values);
        }

        //var_dump($fields);

        $values1 = implode(" , ", $values);
        $fields1 = implode(" , ", $fields);

        $db = Db::getConnection();
       //$sql = "INSERT INTO products(title,price) VALUES ('".$_POST['title']'.'$_POST['price'].")" ;
        $sql = "INSERT INTO $table (". $fields1 .")
                VALUES (". $values1 .")";
        //var_dump($sql);
        //de($sql);
        print_r($sql);
        $result = $db->query($sql);
        //var_dump($result);

    }

    public static function GetInfo($table)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `$table`';
        $result = $db->query($sql);

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