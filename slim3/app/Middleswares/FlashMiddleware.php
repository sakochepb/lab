<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/11/17
 * Time: 17:53
 */
namespace App\Middleswares;

use Slim\Http\Request;
use Slim\Http\Response;

class FlashMiddleware
{

    private  $twig;



    public function __construct(\Twig_Environment $twig){

        $this->twig = $twig;
    }



    public function __invoke(Request $request,Response $response,$next){

        $this->twig->addGlobal('flash ',isset($_SESSION['flash']) ? $_SESSION['flash']: []);
        // doit regarder sin chose dans flash si oui ajouter dans twig uis unset

        //besoin de twig j ai pas donc on va faire injection de dependace
        if(isset($_SESSION['flash'])){
            unset($_SESSION['flash']);
        }


        return $next($request,$response);
    }

}