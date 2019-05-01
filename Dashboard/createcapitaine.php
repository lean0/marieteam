<?php
require("../global.php");
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 10/12/2018
 * Time: 09:56
 */
if (isset($_SESSION['loginAdmin'])) {


    if(isset($_POST['nomCapitaine']) && isset($_POST['prenomCapitaine']) && isset($_POST['emailCapitaine']) && isset($_POST['telephoneCapitaine'])) {
        $nomcapitaine = $_POST['nomCapitaine'];
        $prenomCapitaine = $_POST['prenomCapitaine'];
        $emailCapitaine = $_POST['emailCapitaine'];
        $telephoneCapitaine = $_POST['telephoneCapitaine'];
        $datetoday = time();

        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "CAPITAINE : " . $nomcapitaine . " créé";

        $req = $db->connection()->prepare('INSERT INTO capitaine (nomCapitaine, prenomCapitaine, dateDebut, emailCapitaine, telephoneCapitaine) VALUE (?,?,?,?,?)');
        $req->execute([$nomcapitaine, $prenomCapitaine, $datetoday, $emailCapitaine, $telephoneCapitaine]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);


        header('Location: capitaine.php?success=1');
    }
    else {
        header('Location: capitaine.php?success=0');
    }
} else {
    header('Location: login.php?success=2');
}