<?php
define('ROOT', dirname(__DIR__));
define('__PUBLIC_DIR__', dirname(__DIR__).'/public');

require ROOT .'/app/App.php';

App::load();


$app = App::getInstance();





if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{


    $page = 'posts.index';
}


$page = explode('.', $page);


if($page[0] == 'admin'){
    $controller = '\App\Controller\Admin\\'.ucfirst($page[1]) . 'Controller';
    $action = $page[2];
}else{

    $controller = '\App\Controller\\'.ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
var_dump($page);

$controller = new $controller();
$controller->$action();

/*
if($page === 'home'){

    $controller = new \App\Controller\PostsController();
    $controller->index();


}elseif($page === 'posts.categorie'){
    $controller = new \App\Controller\PostsController();
    $controller->categorie();
}elseif($page === 'posts.show'){
    $controller = new \App\Controller\PostsController();
    $controller->show();
}
elseif($page === 'login'){
    $controller = new \App\Controller\UsersController();
    $controller->login();
}elseif($page === 'admin.posts.index'){
    $controller = new  \App\Controller\Admin\PostsController();
    $controller->index();

}elseif($page === 'admin.posts.edit'){
    $controller = new  \App\Controller\Admin\PostsController();
    $controller->edit();
}elseif($page === 'admin.posts.add'){
    $controller = new  \App\Controller\Admin\PostsController();
    $controller->add();
}elseif($page === 'admin.posts.delete'){
    $controller = new  \App\Controller\Admin\PostsController();
    $controller->delete();
}

*/


?>

