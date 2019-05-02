<?php
require("../global.php");
    if (isset($_POST['nomUser']) && isset($_POST['prenomUser'])) {
        $id = $_GET['key'];
        $nom = $_POST['nomUser'];
        $prenom = $_POST['prenomUser'];
        $mail = $_POST['mailUser'];


        if (strlen($_POST['passwordC']) > 0) {
            echo "password change 1";
            $ps = $_POST['passwordC'];
            $psc = $_POST['passwordConfC'];

            if ($ps == $psc) {
                echo "/password are ok";
                $PH = password_hash($ps, PASSWORD_DEFAULT);
                $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail, password = :password WHERE idClient=' . $id);
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'mail' => $mail,
                    'password' => $PH
                ));
                header('Location: ../compte.php?key=' . $id);
            } else {
                echo "password are not ok";
                header('Location: ../compte.php?key=' . $id . '&error=1');
            }
        } else {
            echo "password do not change";
            $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail WHERE idClient=' . $id);
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail
            ));
            header('Location: ../compte.php?key=' . $id);
        }
    }