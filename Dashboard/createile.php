<?php
require("../global.php");


if(isset($_POST['nomIle'])) {
    $nomIle = $_POST['nomIle'];
    $nomPort = $_POST['nomPort'];

    $nomQui = $_SESSION['login'];
    $Libelle = "ILE : " . $nomIle . " créée";

    $req = $db->connection()->prepare('INSERT INTO iledeservie (nom, nomPort) VALUE (?,?)');
    $req->execute([$nomIle, $nomPort]);

    $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
    $req2->execute([$nomQui, $Libelle]);



    header('Location: lesiles.php?success=1');
}
else {
    header('Location: lesiles.php?success=0');
}


