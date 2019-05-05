<?php

require("../global.php");

if(isset($_POST['selectPortDepart']) && isset($_POST['selectPortArriver']) && isset($_POST['distance'])) {
    $SPD = $_POST['selectPortDepart'];
    $SPA = $_POST['selectPortArriver'];
    $distance = $_POST['distance'];
    $secteur = $_POST['secteur'];

    $nomQui = $_SESSION['loginAdmin'];
    $Libelle = "LIAISON : " . $SPD . "->" . $SPA . " créée";

    $req = $db->connection()->prepare('INSERT INTO liaison (portDepart, portArriver, distance, idSecteur) VALUE (?,?,?,?)');
    $req->execute([$SPD, $SPA, $distance, $secteur[0]]);

    $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
    $req2->execute([$nomQui, $Libelle]);
    $success=1;

    header('Location: liaison.php?success=1');


}
else {
    header('Location: liaison.php?success=0');
}


