<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 16:33
 */
require 'Autoloader.php';
use Database\Connection;
use DIC\Model;
use DIC\DIC;



\DIC\Autoloader::register();
class Foo{

}

class Bar{

    private $foo;
    public function __construct(Foo $foo){
        $this->foo = $foo;
    }
}

$app = new DIC();

var_dump($app->get('Bar'));





/*$dic->set('Connection', function(){
    return new Connection('localhost', 'root','root');
});*/
/*$con = new Database\Connection('localhost', 'root','root');
$dic->setInstance($con);
$dic->set('connection', function(){
    return new Database\Connection('localhost', 'root','root');
});

/*$dic->setFactory('Model', function() use ($dic){
    return new Model($dic->get('connection'));
});*/



//var_dump($dic->get('DIC\Model'));

