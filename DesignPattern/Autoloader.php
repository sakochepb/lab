<?php

namespace DesignPattern;


class Autoloader
{


    public static function register(){

        spl_autoload_register(array(__CLASS__,'load'));
    }


    public static function load($fullClassName){




        if(strpos($fullClassName, __NAMESPACE__) === 0){//si namespace en promiere position on le retire

            $fullClassName = str_replace('\\','/',$fullClassName);
            $classPath = str_replace(__NAMESPACE__.'/', '',$fullClassName);


            require (__DIR__. '/'. $classPath. '.php');
        }


    }

}