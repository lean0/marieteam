<?php

require("../global.php");
if (isset($_SESSION['login'])) {
    if(isset($_POST['secteur'])) {
        $secteur = $_POST['secteur'];

        $nomQui = $_SESSION['login'];
        $Libelle = "Secteur : " . $secteur . " créé";


        $req = $db->connection()->prepare('INSERT INTO secteur (nomSecteur) VALUE (?)');
        $req->execute([$secteur]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);

        header('Location: secteur.php?success=1');


    }
    else {


        header('Location: secteur.php?success=0');


    }

} else {
    header('Location: login.php?success=2');
}
/**
 * Created by PhpStorm.
 * User: sio
 * Date: 11/03/2019
 * Time: 09:19
 */