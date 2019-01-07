<?php
require("../global.php");
if (isset($_SESSION['login'])) {
    if (isset($_POST['nomAdmin']) && isset($_POST['password'])) {
        $nom = $_POST['nomAdmin'];
        $ps = $_POST['password'];
        $dateIn = time();
        $nomQui = $_SESSION['login'];
        $Libelle = "ADMIN : " . $nom . " créé";


        $PH = password_hash($ps, PASSWORD_DEFAULT);
        $req = $db->connection()->prepare('INSERT INTO admin (nomAdmin, password, datedebut) VALUE (?,?,?)');
        $req->execute([$nom, $PH, $dateIn]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);


        header('Location: admin.php');
        ?>
        <?php
    }


} else {
    header('Location: login.php?success=2');
}

?>