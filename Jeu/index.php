<?php
namespace Tutoriel;
use \Tutoriel\HTML\BootstrapForm;
use \Tutoriel\Autoloader;
use \Tutoriel\Archer;

require './classes/Autoloader.php';
Autoloader::register();
echo __NAMESPACE__;


$archer = new Archer('Sakarcher');

var_dump($archer);

$form = new BootstrapForm($_POST);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="script.js"></script>
</head>
<body>

<div id=""></div>
<form action="#" method="post">
    <?php
    echo    $form->input('username');
    echo $form->input('lastname');
    echo $form->input('password');
    echo $form->submit();




    ?>

</form>
</body>
</html>