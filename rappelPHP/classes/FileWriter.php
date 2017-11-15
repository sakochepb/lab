<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 27/10/17
 * Time: 17:47
 */
class FileWriter
{



    public static function write($filename){


        //1 ouverture du fichier

        $monfichier = fopen(__FILE_DIRECTORY__.$filename, 'a+');

        echo $monfichier;
    }

}