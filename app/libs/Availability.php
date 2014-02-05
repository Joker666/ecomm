<?php

/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/1/14
 * Time: 7:15 PM
 */
class Availability
{
    public static function display($availability)
    {
        if ($availability == 0)
            echo "Out Of Stock";
        else if ($availability == 1)
            echo "in Stock";
    }

    public static function displayClass($availability)
    {
        if ($availability == 0)
            echo "outofstock";
        else if ($availability == 1)
            echo "instock";
    }
}