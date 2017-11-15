<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 02/10/17
 * Time: 14:21
 */

namespace LesTraits;
class Autoloader
{


    public static function register(){


        spl_autoload_register(array(__CLASS__, 'load'));

    }

    public static function load($class_name){


        require __DIR__.'/'.$class_name.'.php';
    }

}