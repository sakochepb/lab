<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 16:22
 */
trait Hybridable{


    use Rechargeable, Dieselable{


        Dieselable::rouler as roule_diesel;
        Rechargeable::rouler as rouler_electric;
    }


    public function rouler($km){

        $this->roule_diesel($km);
        $this->rouler_electric($km);

    }

    abstract public function setEnergy();


}