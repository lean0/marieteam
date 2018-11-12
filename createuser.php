<?php
if(isset($_POST['nom'])) {
    User::createUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
}
?>