<?php
require("tpl/header.php");
require("../global.php");

if(isset($_POST['idAdmin']) && isset($_POST['password'])) {
    $id = $_POST['idAdmin'];
    $password = $_POST['password'];

    $req = $db->connection()->prepare('SELECT * FROM admin WHERE nomAdmin LIKE ?');
    $req->execute([$id]);
    $rows = $req->rowCount();
    $data = $req->fetch();
    if ($rows == 1) {
        $pid = $data['idAdmin'];
        $pnom = $data['nomAdmin'];
        $pcheck = $data['password'];
        $date = $data['datedebut'];

        if (password_verify($password, $pcheck)) {


            $_SESSION['loginAdmin'] = $_POST['idAdmin'];
            $_SESSION['pwdAdmin'] = $_POST['password'];
            header('Location: dashboard.php');


        } else {
            header('Location: login.php?success=0');
        }
    } else {
        header('Location: login.php?success=1');
    }
}

