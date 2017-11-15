<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use \App;
use Core\HTML\BootstrapForm;
class CategoriesController extends AppController
{


    public function __construct(){


        parent::__construct();
       // $this->loadModel('Post');
        $this->loadModel('Categorie');
    }

    public function index(){





        $categories = $this->Categorie->all();


         $this->render('admin.categories.index',compact(array('categories')));


    }


    public function add(){


        if(!empty($_POST)){

            $res  = $this->Categorie->create(
                [
                    'libelle'=>$_POST['libelle']



                ]);

            if($res ){


             return  $this->edit();

            }
        }

       // $categories = $this->Categorie->liste('id','libelle');
        $form = new BootstrapForm($_POST);

        $this->render('admin.categories.edit', compact(array( 'form' )));


    }

    public function delete(){



        if(!empty($_POST)){

            $res  = $this->Categorie->delete($_POST['id']);

           return $this->index();
        }



    }


    public function edit(){


        if(!empty($_POST)){

            $res  = $this->Categorie->update($_GET['id'],
                [
                    'libelle'=>$_POST['libelle']

                ]);

            if($res ){
               return $this->index();
            }
        }

        $categorie = $this->Categorie->find($_GET['id']);

        $form = new BootstrapForm($categorie);

      $this->render('admin.categories.edit', compact( 'form'));


    }

}