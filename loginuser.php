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
    if ($mail == $_POST['mail'] && $password == $_POST['password']) {
        session_start ();
        $_SESSION['login'] = $_POST['mail'];
        $_SESSION['pwd'] = $_POST['password'];
        //header ('location: index.php');
    }
    else {
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
