<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 21/09/17
 * Time: 10:25
 */

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;
class UsersController extends AppController
{


    public function login()
    {
        $errors = false;
        if(!empty($_POST))
        {

            $auth = new DBAuth(App::getInstance()->createDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?page=admin.posts.index');

            }else{
                $errors = true;
            }


        }
        $form = new BootstrapForm($_POST);


        $this->render('users.login', compact('form','errors'));




    }



}