<?php

namespace Tutoriel;

class Personnage
{

    protected $nom;
    protected $role;
    protected $vie = 100;
    protected $atk = 20;
    var $arme= "épée";

    public function __construct($nom){

        $this->nom = $nom;


    }

    public function  __toString(){


        return $this->nom;

     }


    public function regenerer($vie = null){
       if(is_null($vie)){
           $this->vie = 100;
       }else{
           $this->vie +=$vie;
       }
    }

    public function mort(){
       return $this->vie <= 0;
    }
    public function attaque($cible){

        $cible->vie -= $this->atk;
      var_dump($cible);

    }

    public function getVie(){
        return $this->vie;
    }


}