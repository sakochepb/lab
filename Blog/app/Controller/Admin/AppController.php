<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 20/09/17
 * Time: 14:50
 */

namespace App\Controller\Admin;

use App\Controller\AppController as BaseAppController;
use \App;
use Core\Auth\DBAuth;

class AppController extends BaseAppController
{

        public function __construct(){

            parent::__construct();

            $app = App::getInstance();
            $auth = new DBAuth($app->createDb());

            if(!$auth->logged()){
                $this->forbidden();
            }




        }


}