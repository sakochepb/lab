<?php
require __DIR__.'/Autoloader.php';

\LesTraits\Autoloader::register();


$zoe = new Zoe();
var_dump($zoe);
$zoe->rouler(20);

var_dump($zoe);