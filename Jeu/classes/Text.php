<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 11/09/17
 * Time: 17:34
 */
class Text
{

    private static $suffix = "€";




    public  static function withZero($chiffre){
        if($chiffre < 10){
            return '0'.self::$suffix;
        }else{
            return self::$suffix;
        }
    }


}