<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 18/09/17
 * Time: 11:04
 */

namespace Core\Entity;

class Entity
{


    public function __get($key){

        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();

        return $this->$key;
    }

}