<?php

require("../global.php");

    if(isset($_POST['nom']) && isset($_POST['typeBateau']) && isset($_POST['capaciteBateau'])) {
        echo $_POST['nom'];
        $nom = $_POST['nom'];
        $type = $_POST['typeBateau'];
        $capa = $_POST['capaciteBateau'];

        $req = $db->connection()->prepare('INSERT INTO bateau (nom, typeBateau, capaciteBateau) VALUE (?,?,?)');
        $req->execute([$nom, $type, $capa]);
        $success=1;
        
        header('Location: table.php');


    }
    else {


        header('Location: table.php');
        $_SESSION['success'] = 0;

    }

