<?php

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $PH = password_hash($password, PASSWORD_DEFAULT);
    $pdo = new PDO('mysql:host=localhost;dbname=marieteam', 'root', '');

    $req = $pdo->prepare('INSERT INTO client (nom, prenom, mail, password) VALUE (?,?,?,?)');
    $req->execute([$nom, $prenom, $mail, $PH]);

}
?>

