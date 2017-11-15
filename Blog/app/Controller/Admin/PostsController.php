<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use \App;
use Core\HTML\BootstrapForm;
class PostsController extends AppController
{


    public function __construct(){


        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Categorie');
    }

    public function index(){





        $posts = $this->Post->all();


         $this->render('admin.posts.index',compact(array('posts')));


    }


    public function add(){


        if(!empty($_POST)){

            $res  = $this->Post->create(
                [
                    'titre'=>$_POST['titre'],
                    'contenu'=>$_POST['contenu'],
                    'categorie_id'=>$_POST['categorie_id']


                ]);

            if($res ){



                header('Location: admin.php?page=admin.posts.edit&id='.App::getInstance()->createDb()->lasInsertId());

            }
        }

        $categories = $this->Categorie->liste('id','libelle');
        $form = new BootstrapForm($_POST);

        $this->render('admin.posts.edit', compact(array('categories', 'form', )));


    }

    public function delete(){



        if(!empty($_POST)){

            $res  = $this->Post->delete($_POST['id']);

           return $this->index();
        }



    }


    public function edit(){


        if(!empty($_POST)){

            $res  = $this->Post->update($_GET['id'],
                [
                    'titre'=>$_POST['titre'],
                    'contenu'=>$_POST['contenu'],
                    'categorie_id'=>$_POST['categorie_id']


                ]);

            if($res ){
               return $this->index();
            }
        }

        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Categorie');
        $categories = $this->Categorie->liste('id','libelle');
        $form = new BootstrapForm($post);

      $this->render('admin.posts.edit', compact('categories', 'form'));


    }

}