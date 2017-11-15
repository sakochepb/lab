<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 02/10/17
 * Time: 14:18
 */
class Zoe extends Voiture
{

    use Hybridable;/*, Dieselable {

  Dieselable::rouler insteadof Rechargeable;
    }*/

    private $name = "zoe";

   /* public function rouler($km){
       //$this->rouler_electrique($km);
        $this->km += $km *2;
    }*/

    public function setEnergy()
    {
        // TODO: Implement setEnergy() method.
    }
}