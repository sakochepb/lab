<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 18/09/17
 * Time: 12:11
 */

namespace App\Entity;


use Core\Entity\Entity;

class CategorieEntity extends Entity
{



    public function getUrl(){
        return 'index.php?page=posts.categorie&id='.$this->id;
    }
}