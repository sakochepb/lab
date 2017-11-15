<?php
session_start();
if(isset($_FILES['monCv']) && $_FILES['monCv']['error'] == 0){

    echo $_FILES['monCv']['type'] ."<br>";
    echo $_FILES['monCv']['size']."<br>"; // en octets
    echo $_FILES['monCv']['tmp_name']."<br>";
    echo $_FILES['monCv']['name']."<br>";
    echo $_FILES['monCv']['error']."<br>";

    $res =  move_uploaded_file($_FILES['monCv']['tmp_name'], 'uploads/'.basename($_FILES['monCv']['name']));


    if($res){
        echo "Upload réussi";
    }else{
        echo "Erreur lors de l'upload";
    }


    if( $_FILES['monCv']['size'] <= 100000000000000){
        $infoFichier = pathinfo($_FILES['monCv']['name']);
        $extension_upload = $infoFichier['extension'];

        $extension_autoriser = array("pdf","gif","doc","png");
        if(in_array($extension_upload, $extension_autoriser)){
            //si parmi ext autoriser on peut valide ret ddécplacer le fichier définitivement
           $res =  move_uploaded_file($_FILES['monCV']['tmp_name'], 'uploads/'.basename($_FILES['monCv']['name']));


            if($res){
                echo "Upload réussi";
            }else{
                echo "Erreur lors de l'upload";
            }

        }

        echo print_r($infoFichier);
        echo $extension_upload;
    }


}