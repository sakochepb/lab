<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 15/09/17
 * Time: 14:25
 */

namespace App\Table;
use Core\Table\Table;

class PostTable extends Table
{

    protected $table = "articles";
    /**
     * Récupère mes deniers articles
     * @return array
     */
    public function last(){

        return $this->query('SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.libelle as categorie
        FROM articles
        LEFT JOIN categories ON categorie_id = categories.id
        ORDER BY articles.date DESC

        ');
    }

    /**
     * Récupère mes deniers articles
     * @return array
     */
    public function getLastByCategorie($id){

        return $this->query('SELECT a.id, a.titre, a.contenu, categories.libelle as categorie
                                    FROM articles a
                                    LEFT JOIN categories
                                    ON a.categorie_id = categories.id
                                    WHERE a.categorie_id = ?
                                    ORDER BY a.date DESC

                                    ', [$id]);


    }

    /**
     * @param $id
     * @return \App\Entity\PostEntity
     */
    public function findWithCategorie($id){

        return $this->query('SELECT a.id, a.titre, a.contenu,a.categorie_id ,categories.libelle as categorie
                                    FROM articles a
                                    LEFT JOIN categories
                                    ON categorie_id = categories.id
                                    WHERE a.id = ?', [$id],true);


    }





}