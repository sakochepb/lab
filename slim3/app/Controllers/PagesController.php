<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;


/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/11/17
 * Time: 10:28
 */
class PagesController extends Controller
{



    public function home(RequestInterface $request, ResponseInterface $response){
       $this->render($response, 'pages/home.twig', ['name'=>'marc']);
    }

    public function getContact(RequestInterface $request, ResponseInterface $response){

 //if c 'est long on va plutot créer un middleware
  /*  $flash  = isset($_SESSION['flash']) ? $_SESSION['flash']: [];
        //on supprime ce qui été en session pour qu il disparaisse lors dune 2eme actualisation

        $_SESSION['flash'] = [];
*/
        $this->render($response, 'pages/contact.twig');

    }

    public function postContact(RequestInterface $request, ResponseInterface $response){

       $params = $request->getParams();
        $email = $params['email'];

       $this->flash('Votre message à bien été envoyé');

        /*
       $message = new \Swift_Message('Message de contact');
        $message ->setFrom("sdebiche@wesend.com")
           ->setTo($email)
           ->setBody("Email vous a été envoyé :
           {$request->getParam('message')}
           ");
        $this->mailer->send($message);
*/


     //  exit;

       return $this->redirect($response,'contact');

    }


}