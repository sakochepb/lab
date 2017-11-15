<?php

namespace Tutoriel;
class Autoloader
{


  static function register(){


      spl_autoload_register(array(__CLASS__,'autoload'));
  }


    public static function autoload($class_name){


        /**
         * Ne charger que les clacess appartenant au namespace de la classe
         */
        if(strpos($class_name,__NAMESPACE__.'\\') ===0){


        $class_name = str_replace(__NAMESPACE__.'\\',"",$class_name);
        $class_name = str_replace('\\','/', $class_name);
var_dump('classes/'.$class_name.'.php');
        include 'classes/'.$class_name.'.php';

        }
    }



}