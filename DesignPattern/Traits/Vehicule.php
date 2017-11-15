<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 02/10/17
 * Time: 14:13
 */
class Vehicule
{


    protected $roue = 4;
    protected $km = 0;


    public function rouler($km){

        $this->km += $km;

    }

}