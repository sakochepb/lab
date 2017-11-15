<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 15/09/17
 * Time: 14:26
 */
namespace App\Table;

use Core\Table\Table;

class CategorieTable  extends Table
{

    protected $table = "categories";

    public function last(){

        return $this->query('SELECT categories.id, categories.libelle FROM categories');

    }

}