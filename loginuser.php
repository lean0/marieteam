<?php
require("tpl/header.php");
require("global.php");
?>
<?php

if(isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];


    $req = $db->connection()->prepare('SELECT mail,password FROM client WHERE mail LIKE ?');
    $req->execute([$mail], $pww= array($_GET['password']));
    echo $pww;
    if($password==$req->fetch(password)){


    }
}