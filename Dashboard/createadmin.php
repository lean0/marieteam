<?php
require("../global.php");
if (isset($_SESSION['loginAdmin'])) {
    if (isset($_POST['nomAdmin']) && isset($_POST['password'])) {
        $nom = $_POST['nomAdmin'];
        $ps = $_POST['password'];
        $dateIn = time();
        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "ADMIN : " . $nom . " créé";

        $PH = password_hash($ps, PASSWORD_DEFAULT);


        $req3 = $db->connection()->prepare('SELECT * FROM admin WHERE nomAdmin LIKE ?');
        $req3->execute([$nom]);
        $rows = $req3->rowCount();
        if ($rows == 0) {
            $req = $db->connection()->prepare('INSERT INTO admin (nomAdmin, password, datedebut) VALUE (?,?,?)');
            $req->execute([$nom, $PH, $dateIn]);

            $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
            $req2->execute([$nomQui, $Libelle]);
            header('Location: admin.php?success=1');
        }
        else {
            header('Location: admin.php?success=0');
        }
        ?>
        <?php
    }


} else {
    header('Location: login.php?success=2');
}

?>