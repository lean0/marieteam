<?php

require("../global.php");
if (isset($_SESSION['login'])) {
    if(isset($_POST['nom']) && isset($_POST['typeBateau']) && isset($_POST['capaciteBateau'])) {
        echo $_POST['nom'];
        $nom = $_POST['nom'];
        $type = $_POST['typeBateau'];
        $capa = $_POST['capaciteBateau'];

        $nomQui = $_SESSION['login'];
        $Libelle = "BATEAU : " . $nom . " créé";


        $req = $db->connection()->prepare('INSERT INTO bateau (nom, typeBateau, capaciteBateau) VALUE (?,?,?)');
        $req->execute([$nom, $type, $capa]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);

        header('Location: table.php?success=1');


    }
    else {


        header('Location: table.php?success=0');


    }

} else {
    header('Location: login.php?success=2');
}
