<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 28/08/17
 * Time: 15:59
 */

namespace Jeu;
class Autoloader
{

    public static function register(){

        spl_autoload_register(array(__CLASS__,"autoload"));
    }


    public static function autoload($name){


        $name= str_replace(__NAMESPACE__, '',$name);
        $name = str_replace('\\','/',$name);

        echo "require";
        echo (__NAMESPACE__.'/classes/'.$name.'.php');
        echo "<br>";
        include(__NAMESPACE__.'/classes/'.$name.'.php');


    }

}