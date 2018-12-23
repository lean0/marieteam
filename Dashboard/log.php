<?php
require("tpl/header.php");
require("../global.php");

if(isset($_POST['idAdmin']) && isset($_POST['password'])) {
    $id = $_POST['idAdmin'];
    $password = $_POST['password'];

    $req = $db->connection()->prepare('SELECT * FROM admin WHERE idAdmin LIKE ?');
    $req->execute([$id]);
    $rows = $req->rowCount();
    $data = $req->fetch();
    if ($rows == 1) {
        $pid = $data['idAdmin'];
        $pnom = $data['nomAdmin'];
        $pcheck = $data['password'];
        $date = $data['datedebut'];

        if (password_verify($password, $pcheck)) {


            $_SESSION['login'] = $_POST['idAdmin'];
            $_SESSION['pwd'] = $_POST['password'];
            header('Location: dashboard.php');


        } else {
            //Alerte Bootstrap PASSWORD
        }
    } else {

        //Alerte Bootstrap USER

    }
}

