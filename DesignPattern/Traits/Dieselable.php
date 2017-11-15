<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 15:38
 */

trait Dieselable{


    public function polluer(){

        echo" vroum vroum les partivule";

    }

    public function rouler($km){
        $this->polluer();
    }
}