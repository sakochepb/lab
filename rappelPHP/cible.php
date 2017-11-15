<?php
session_start();

$fileWriter = new FileWriter();
if(isset($_POST['nom']))
{

    $nom = strip_tags(trim((string)$_POST['nom']));
    echo "Bnjour $nom";
    $_SESSION['nom'] = $nom;
}

if(isset($_POST['frites']))
{

    $frite = $_POST['frites'];
    echo "Aimez vous les frites : $frite";
}

//faille XSS: cross-site scripting