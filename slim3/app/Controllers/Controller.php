<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/11/17
 * Time: 14:43
 */

namespace App\Controllers;


use Slim\Container;

class Controller
{

    protected $container;


    public function __construct(Container $container){

        $this->container = $container;

    }


    public function render($response, $file,$args = array()){
        $this->container->view->render($response, $file,$args);
    }



    public function __get($name){

        return $this->container->get($name);

    }

    public function redirect($response, $name){

      return   $response->withStatus(302)->withHeader('Location', $this->router->pathFor($name));


}

    public function flash($message , $type= 'success' ){

        if(!isset ($_SESSION['flash'])){
            $_SESSION['flash'] = [];
        }

     return   $_SESSION['flash'][$type] = $message;


    }



}