<?php

require 'Autoloader.php';

\Basephp\Autoloader::register();
session_start();

setcookie('pseudo','sakina',time() + 365*24*3600);

$filewriter = new FileWriter();

$filewriter->write("premier.php");



class Animal{

    protected $nom;
    protected $type;

    public function __construct($nom, $type){
        $this->nom=$nom;
        $this->type = $type;
    }
}


print_r($_ENV);
print_r($_COOKIE);

print_r($_SESSION,true);
echo $_SESSION['nom'];

?>


<form method="post" action="cible.php">
    <p>
        <label>Nom</label><br>
        <input type="text" name="nom"/>

        <label>Aimez vous les frites</label>
        <input type="radio" name="frites" value="oui" id="oui" checked="checked"><label for="oui">Oui</label>
        <input type="radio" name="frites" value="non" id="non" ><label for="non">non</label>

        <input type="submit" value="Valdier">
    </p>

</form>


<form method="post" action="upload.php" enctype="multipart/form-data">
    <p>Envoi de fichier</p>
    <p>
        <input type="file" name="monCv">
        <input type="submit" value="Valdier">
    </p>

</form>
