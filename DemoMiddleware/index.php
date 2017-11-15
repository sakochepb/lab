<?php
require './vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use  function Http\Response\send;
use App\Dispatcher;
$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();


ini_set('display_errors', 1);

/**
 *
 * notre middleware qui reçoi en param la requete et le prochain middlewar à appeler
 * @param ServerRequestInterface $request
 * @param callable $next = le prochain middleware a appeler
 */
$trailingSlash = function(ServerRequestInterface $request,ResponseInterface $response ,  callable $next){


    $url = (string) $request->getUri()->getPath();

    if(!empty($url) && $url[-1] === '/'){
        $response = new \GuzzleHttp\Psr7\Response();
        /**
         * on retire le dernier slash
         */
        $response->withHeader('Location',substr($url, 0,-1))->withStatus("301");


    }

    return $next($request,$response);

};



$quotMiddleware = function (ServerRequestInterface $request,ResponseInterface $response , callable $next){

  $response->getBody()->write('""');
    $response = $next($request,$response);
    $response->getBody()->write('""');

    return $response;

};


/**
 * @param ServerRequestInterface $request
 * @param ResponseInterface $response
 * @param callable $next
 * @return ResponseInterface|static
 * Application est un middleware elle même
 */
$app= function(ServerRequestInterface $request,ResponseInterface $response , callable $next){

    $url = $request->getUri();
    if($url->getPath() === '/lab/DemoMiddleware/index.php/blog'){
echo "Je suis sur le blog";

        $response->getBody()->write('Je suis sur le blog');
    }elseif($url->getPath() === '/lab/DemoMiddleware/index.php/contact/'){
        $response->getBody()->write('Me contacter');
        echo "Me contacter";
    }else{
        $response->getBody()->write('Not found');
        $response =$response->withStatus("404");
    }

    return $response;


};

/**
 * Pour passer par tous nos middleware on créer requeste/réponse
 */

    $response = new \GuzzleHttp\Psr7\Response();
$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();


$dispatcher = new \App\Dispatcher();
$dispatcher->pipe($trailingSlash);
$dispatcher->pipe(new \Psr7Middlewares\Middleware\FormatNegotiator());
$dispatcher->pipe($quotMiddleware);
$dispatcher->pipe($app);


send($dispatcher->process($request, $response));