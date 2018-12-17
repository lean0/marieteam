<?php
require("../global.php");
/**
 * Created by PhpStorm.
 * User: sio
 * Date: 10/12/2018
 * Time: 09:56
 */



    if(isset($_POST['nomCapitaine']) && isset($_POST['prenomCapitaine']) && isset($_POST['emailCapitaine']) && isset($_POST['telephoneCapitaine'])) {
        $nomcapitaine = $_POST['nomCapitaine'];
        $prenomCapitaine = $_POST['prenomCapitaine'];
        $emailCapitaine = $_POST['emailCapitaine'];
        $telephoneCapitaine = $_POST['telephoneCapitaine'];
        $datetoday = time();

        $req = $db->connection()->prepare('INSERT INTO capitaine (nomCapitaine, prenomCapitaine, dateDebut, emailCapitaine, telephoneCapitaine) VALUE (?,?,?,?,?)');
        $req->execute([$nomcapitaine, $prenomCapitaine, $datetoday, $emailCapitaine, $telephoneCapitaine]);

        header('Location: typography.php?success=1');
    }
    else {
        header('Location: typography.php?success=0');
    }
