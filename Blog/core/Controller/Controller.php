<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 20/09/17
 * Time: 14:29
 */

namespace Core\Controller;
class Controller
{


    protected $viewPath;
    protected $layout;

    public function render($view, $params =[]){

        ob_start();

            extract($params);
            require($this->viewPath . str_replace('.','/',$view). '.php');

        $content = ob_get_clean();

        require($this->viewPath . '/templates/'. $this->template. '.php');

     }
}