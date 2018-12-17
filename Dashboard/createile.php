<?php
require("../global.php");


if(isset($_POST['nomIle'])) {
    $nomIle = $_POST['nomIle'];
    $req = $db->connection()->prepare('INSERT INTO iledeservie (nom) VALUE (?)');
    $req->execute([$nomIle]);
    header('Location: lesiles.php');
}


