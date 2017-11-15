<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 27/10/17
 * Time: 17:42
 */

namespace Basephp;

class Autoloader
{


    public static function register(){


        require __DIR__."/classes/constantes.php";
        spl_autoload_register(array(__CLASS__,'autoload'));

    }


    public static function autoload($class_name){

        if(strpos($class_name, __NAMESPACE__."\\")){
            $class_name = str_replace(__NAMESPACE__ ."\\", "", $class_name);
        }



        require __DIR__."/classes/$class_name.php";

    }

}