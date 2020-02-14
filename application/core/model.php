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
    public static function findAll()
    {

    }

    function find($columnValue)
    {
        return sql::select($this->getTableName());
    }

    function save()
    {

    }

    function load($fieldValue = null)
    {


    }
    function update(){

    }

    protected function getClassName()
    {
        $mass = strtolower(explode("Model_", get_class($this))[1]);
        return $mass;

    }

}
