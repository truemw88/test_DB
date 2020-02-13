<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/4/2020
 * Time: 12:17 PM
 */

//НАЙТИ ИМЯ НАСЛЕДНИКА getTableName()

abstract class Model
{
    function find()
    {
        return MySQL::select($this->getTableName());

    }

    function save()
    {

    }

    function load()
    {


    }

    private function getTableName()
    {
        $mass = strtolower(explode("Model_", get_class($this))[1]);
        return $mass;

    }

}
