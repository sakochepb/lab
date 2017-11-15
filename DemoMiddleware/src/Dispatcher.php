<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 18/10/17
 * Time: 12:07
 */
namespace App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Dispatcher
{


    private $middlewares = [];
    private $index = 0;


    /**
     * @param callable $middleware
     * Enrefistre middleware
     */
    public function pipe(callable $middleware){



        $this->middlewares[] = $middleware;

    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * permet d'executer   les middleware
     */
    public function process(ServerRequestInterface $request , ResponseInterface $response):ResponseInterface{



        $middleware = $this->getMiddleware();
        $this->index++;

        if(is_null($middleware)){
            return $response;
        }



        return $middleware($request, $response, [$this, 'process']/**
         * notation veut dire appel la fonction process de cette classe*/);


    }


    public function getMiddleware(){

        if(isset($this->middlewares[$this->index])){
            return $this->middlewares[$this->index];
        }

            return null;

    }

}