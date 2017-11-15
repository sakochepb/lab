<?php

require 'vendor/autoload.php';
//$loader->addPsr4('App\\', __DIR__.'/app');
$hello = new App\Hello();
//$cache = new \App\Cache();

$cache = new \Doctrine\Common\Cache\FilesystemCache(__DIR__.'/cache');
$adapter = new \App\DoctrineCacheAdapter($cache);

echo $hello->sayHello($adapter);