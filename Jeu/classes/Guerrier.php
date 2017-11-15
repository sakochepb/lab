<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 28/08/17
 * Time: 16:30
 */

namespace Jeu;


class Guerrier extends Personnage
{


    public $presentation;

    public function __construct(){

        $this->race = "Guerrier";
        $this->presentation =" Bonjour je suis un nouveau guerrier";


    }


}