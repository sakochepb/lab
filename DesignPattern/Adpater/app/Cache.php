<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 04/10/17
 * Time: 16:59
 */

namespace App;


class Cache implements CacheInterface
{

    public function get($key){
        return false;
    }


    public function has($key){
        return false;
    }


    public function set($key,$value, $expiration = 3600){
        return false;
    }

}