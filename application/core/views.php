<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/4/2020
 * Time: 12:18 PM
 */

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        /*if (is_array($data)) {
            //преобразуем элементы массива в переменные
            extract($data);
        }*/

        include 'application/views/'.$template_view;
    }

    function renderObjects($data)
    {
        include 'render-object.php';
    }
}