<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 20/09/17
 * Time: 14:50
 */

namespace App\Controller;


use Core\Controller\Controller;
use \App;

class AppController extends Controller
{

    protected $template = 'default';

    public function __construct(){

        $this->viewPath = ROOT .'/app/Views/';



    }

    protected function loadModel($model_name){

      $this->$model_name =   App::getInstance()->getTable($model_name);
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die ("Acces interdit");
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die ("Page introuvable");
    }


}