<?php
require_once "class/User.php";
$utilisateur = new User();
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $password= $utilisateur->createUser($nom, $prenom, $mail, $password);

}


?>