<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 28/08/17
 * Time: 15:53
 */

namespace Jeu;
class PersonnageFactory
{

    public static function create($race){


        return new $race;
    }


}