<?php

namespace Tutoriel;
class Archer extends Personnage
{

    public $arc = 3;
    public $arme = "arc";

    public function attaque($cible)
    {

        $cible->vie -= 2 * $this->atk;
        $cible->empecher_negatif();
     }


}