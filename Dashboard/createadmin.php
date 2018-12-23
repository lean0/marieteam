<?php
require("../global.php");

if(isset($_POST['nomAdmin']) && isset($_POST['password'])) {
    $nom = $_POST['nomAdmin'];
    $ps = $_POST['password'];
    $dateIn = time();


        $PH = password_hash($ps, PASSWORD_DEFAULT);
        $req = $db->connection()->prepare('INSERT INTO admin (nomAdmin, password, datedebut) VALUE (?,?,?)');
        $req->execute([$nom, $PH, $dateIn]);
        header('Location: admin.php');
    ?>
        <?php
    }




?>