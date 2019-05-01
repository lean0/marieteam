<?php
require("../global.php");
if (isset($_SESSION['loginAdmin'])) {
    if (isset($_POST['nomUser']) && isset($_POST['prenomUser'])) {
        $id = $_POST['idUser'];
        $nom = $_POST['nomUser'];
        $prenom = $_POST['prenomUser'];
        $mail = $_POST['mailUser'];
        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "USER : " . $nom . " modifié";

    if (isset($_POST['password'])) {
        $ps = $_POST['password'];
        $PH = password_hash($ps, PASSWORD_DEFAULT);
        $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail, password = :password WHERE idClient='.$id);
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail,
            'password' => $PH
        ));
    }
    else {
        $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail WHERE idClient='.$id);
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail
        ));
    }

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);
        header('Location: client.php?success=1');
    } else {
        header('Location: client.php?success=0');
    }
}