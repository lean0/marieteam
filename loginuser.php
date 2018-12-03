<?php
require("tpl/header.php");
require("global.php");

if(isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $req = $db->connection()->prepare('SELECT * FROM client WHERE mail LIKE ?');
    $req->execute([$mail]);
    $rows = $req->rowCount();
    $data = $req->fetch();
    if ($rows == 1) {

        $pcheck = $data['password'];
        $pnom = $data['nom'];

        if (password_verify($password, $pcheck)) {

            $_SESSION['login'] = $_POST['mail'];
            $_SESSION['pwd'] = $_POST['password'];
            $_SESSION['nom'] = $pnom ;
            header('Location: index.php');


        } else {
            //Alerte Bootstrap PASSWORD
        }
    } else {

        //Alerte Bootstrap USER

    }
}

