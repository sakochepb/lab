<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 02/10/17
 * Time: 14:15
 */

trait Rechargeable{
    public $energy = 100;


    public function recharger($valeur){
        $this->energy = $valeur;
    }


    public function rouler($km){

        parent::rouler($km);
        $this->energy -=$km;
    }
}