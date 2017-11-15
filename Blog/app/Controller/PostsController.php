<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 20/09/17
 * Time: 14:31
 */

namespace App\Controller;
use App;

use App\Controller\AppController;


class PostsController extends AppController
{


    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Categorie');


    }



    public function index(){

        $posts =  $this->Post->last() ;
        $categories = $this->Categorie->all();


       $arrayCompact =   compact(array('posts', 'categories'));


        $this->render('posts.index', $arrayCompact);

    }

    public function categorie(){



        $categorie =  $this->Categorie->find($_GET['id']);
        var_dump($categorie);

        if($categorie === false){
           $this->notFound();
        }
        $articles = $this->Post->getLastByCategorie($_GET['id']);
        $categories =  $this->Categorie->all();

        $this->render('posts.categorie', compact(array('categories','categorie','articles')));
    }


    public function show(){

        $article = $this->Post->findWithCategorie($_GET['id']);
        $this->render('posts.show',compact(array('article')));



    }
}