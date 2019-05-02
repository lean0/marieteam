<?php
require("../global.php");
    if (isset($_POST['nomUser']) && isset($_POST['prenomUser'])) {
        $id = $_GET['key'];
        $nom = $_POST['nomUser'];
        $prenom = $_POST['prenomUser'];
        $mail = $_POST['mailUser'];


        //Si le champ password est set (si il fait au moins 1 char)
        if (strlen($_POST['passwordC']) > 0) {
            $ps = $_POST['passwordC'];
            $psc = $_POST['passwordConfC'];

            //verify si les 2 champs password et comfirm password correspondent
            if ($ps == $psc) {
                $PH = password_hash($ps, PASSWORD_DEFAULT);
                $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail, password = :password WHERE idClient=' . $id);
                $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'mail' => $mail,
                    'password' => $PH
                ));
                header('Location: ../compte.php?key=' . $id);

                //Si les deux champs ne correspondent pas, retourne sur compte.php avec un message d'erreur
            } else {
                header('Location: ../compte.php?key=' . $id . '&error=1');
            }
            //Si le champ password n'a pas été rempli, update uniquement les autres champs
            //(Pour éviter de set le password du compte en un password blanc)
        } else {
            $req = $db->connection()->prepare('UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail WHERE idClient=' . $id);
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $mail
            ));
            header('Location: ../compte.php?key=' . $id);
        }
    }