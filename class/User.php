<?php

class User
{
private $name;
private $email;
private $password;
private $nom;
private $prenom;

    public function createUser($nom, $prenom, $email, $password){
        $PH = password_hash($password, PASSWORD_DEFAULT);
        $time = time();

        $req = Database::connect()->prepare("INSERT INTO client (nom, prenom, email, password_hashed, dateInscription) VALUE (?,?,?,?,?)");
        $req->execute([$nom, $prenom, $email, $PH, $time]);
    }


    public function checkConnexion($token, $login = null, $password = null){

        if(!$token){
            $connexion = Database::connect()->prepare("SELECT * from client WHERE idClient = ? AND password_hashed = ?");
            $connexion->execute([$login, password_hash($password, PASSWORD_DEFAULT)]);
        }
        else{
            //token expiration
            $connexion = Database::connect()->prepare("SELECT * FROM client where session = ?");
            $connexion->execute([$_COOKIE['Session']]);
        }

    }
}

