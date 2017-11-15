<?php
require 'vendor/autoload.php';
require 'Autoloader.php';

\DesignPattern\Autoloader::register();

$session = new \DesignPattern\Interfaces\Session();
$flash = new \DesignPattern\Interfaces\Flash($session); //injection de dépendance on passe objet session au flash


if(isset($_GET['page'])){
    $page = $_GET['page'];

}else{
    $page = 'index';
}
$pages = ['flash','index'];

if(!in_array($page, $pages)){
    die('Put the coconut NOW ! ');
}
ob_start();

require "views/{$page}.php";

$content = ob_get_clean();
require 'views/layout.php';



?>