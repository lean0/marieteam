<?php
require("global.php");
?>
<?php

if(isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];


    $req = $db->connection()->prepare('SELECT mail,password FROM client WHERE mail LIKE ?');
    $req->execute([$mail]);
    if(password_verify($password, $req['password'])){
    echo($test);

    }
}