<?php

require("../global.php");
if (isset($_SESSION['loginAdmin'])) {
    if(isset($_POST['nom']) && isset($_POST['typeBateau']) && isset($_POST['capaciteBateau'])) {
        echo $_POST['nom'];
        $nom = $_POST['nom'];
        $type = $_POST['typeBateau'];
        $capa = $_POST['capaciteBateau'];
        $capaV = $_POST['capaciteVoiture'];
        $capaC = $_POST['capaciteCamion'];
        $long = $_POST['longeur'];
        $larg = $_POST['largeur'];
        $vitesse = $_POST['vitesse'];
        $image = $_POST['image'];
        $idb = $_POST['idBateau'];

        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "BATEAU : " . $nom . " créé";
        

        $req = $db->connection()->prepare('INSERT INTO bateau (idBateau ,nom, typeBateau, capaciteBateau, CapaciteVoiture, CapaciteCamion, Longeur, Largeur, vitesse, Image) VALUE (?,?,?,?,?,?,?,?,?,?)');
        $req->execute([$idb, $nom, $type, $capa, $capaV, $capaC, $long, $larg, $vitesse, $image]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);

        header('Location: bateau.php?success=1');


    }
    else {


        header('Location: bateau.php?success=0');


    }

} else {
    header('Location: login.php?success=2');
}
