<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 18/09/17
 * Time: 10:45
 */

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{


    protected $table = "articles";


    public function getUrl(){
        return 'index.php?page=posts.show&id='.$this->id;
    }


    public function getExtrait(){

        $html = '<p>'.substr($this->contenu,0, 100).'...</p>';
        $html .= '<p> <a href="'. $this->getUrl() . '" id="">Voir la suite</a>';

        return $html;

    }








}