<?php
require("../global.php");


if(isset($_POST['nomIle'])) {
    $nomIle = $_POST['nomIle'];
    $nomPort = $_POST['nomPort'];
    $req = $db->connection()->prepare('INSERT INTO iledeservie (nom, nomPort) VALUE (?,?)');
    $req->execute([$nomIle, $nomPort]);
    header('Location: lesiles.php');
}


