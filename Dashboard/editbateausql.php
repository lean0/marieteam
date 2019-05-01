<?php
require("../global.php");
if (isset($_SESSION['loginAdmin'])) {
    if (isset($_POST['nomBateau']) && isset($_POST['capaciteBateau'])) {
        $id = $_POST['idBateau'];
        $nom = $_POST['nomBateau'];
        $type = $_POST['typeBateau'];
        $capacite = $_POST['capaciteBateau'];
        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "BATEAU : " . $nom . " modifié";

        $req = $db->connection()->prepare('UPDATE bateau SET nom = :nom, typeBateau = :typeB, capaciteBateau = :capacite WHERE idBateau='.$id);
        $req->execute(array(
            'nom' => $nom,
            'typeB' => $type,
            'capacite' => $capacite
        ));

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);
        header('Location: bateau.php?success=1');
    } else {
        header('Location: bateau.php?success=0');
    }
}