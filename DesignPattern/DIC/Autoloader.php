<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 16:33
 */
namespace DIC;

class Autoloader
{

    public static function register(){

        spl_autoload_register(array(__CLASS__,'load_classes') );



    }

    public static function load_classes($full_class_name){


        $class_name = str_replace(__NAMESPACE__.'\\', '', $full_class_name);
       // var_dump($class_name);
        $class_name = str_replace("\\","/",$class_name); //pour les sous dossier
        var_dump( __DIR__. "/".$class_name.".php");
        require_once __DIR__. "/".$class_name.".php";





    }

}