<?php
require("tpl/header.php");
require("global.php");

if(isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $req = $db->connection()->prepare('SELECT mail,password FROM client WHERE mail LIKE ?');
    $req->execute([$mail]);
    $rows = $req->rowCount();
    $data = $req->fetch();
    if ($rows == 1) {

        $pcheck = $data['password'];

        if (password_verify($password, $pcheck)) {
            $_SESSION['login'] = $data['mail'];
            header('Location: index.php');

        }
        else {
            //Alerte Bootstrap PASSWORD
        }
    }
    else {

        //Alerte Bootstrap USER

    }


}