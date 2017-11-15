<?php
define('ROOT', dirname(__DIR__));
define('__PUBLIC_DIR__', dirname(__DIR__).'/public');

require ROOT .'/app/App.php';
use Core\Auth\DBAuth;
App::load();


$app = App::getInstance();





if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{


    $page = 'home';
}



$auth = new DBAuth($app->createDb());

if(!$auth->logged()){
    $app->forbidden();
}


/*

if($page === 'home'){
    require ROOT . '/pages/admin/posts/index.php';
}elseif($page === 'posts.categorie'){
    require ROOT . '/pages/admin/posts/categorie.php';
}elseif($page === 'posts.show'){
    require ROOT . '/pages/admin/posts/show.php';
}elseif($page === 'posts.edit'){
    require ROOT . '/pages/admin/posts/edit.php';
}elseif($page === 'posts.add'){
    require ROOT . '/pages/admin/posts/add.php';
}elseif($page === 'posts.delete'){
    require ROOT . '/pages/admin/posts/delete.php';
}
elseif($page === 'categories.delete'){
    require ROOT . '/pages/admin/categories/delete.php';
}elseif($page === 'categories.add'){
    require ROOT . '/pages/admin/categories/add.php';
}
elseif($page === 'categories.edit'){
    require ROOT . '/pages/admin/categories/edit.php';
}
elseif($page === 'categories'){
    require ROOT . '/pages/admin/categories/index.php';
}



require ROOT. '/pages/templates/default.php';*/

?>

