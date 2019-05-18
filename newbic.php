<?php
require("global.php");
if (isset($_POST['new-bic']))
{
    if ($_POST['mybic'] == "" && $_POST['bic'] == "" )
     {
         echo "it is empty";
     }
     else
     {
         if (isset($_POST['mybic']))
         {
                //$getid = $db->connection()->prepare('SELECT id FROM bic WHERE lib = '. $_POST['mybic'] );
                //$getid->execute();
                $req = $db->connection()->prepare('INSERT INTO client (idBic) VALUE ('.$_POST['mybic'].' WHERE idClient ='.$_SESSION["id"].')');
                $req->execute();
         }
         else
         {
            if (preg_match("/^[a-zA-Z ]*$/",$_POST['bic']))
            {
                $addBic = $db->connection()->prepare('INSERT INTO bic (lib) VALUE ('.$_POST["bic"].')');
                $addBic->execute();

                $updateIdBic = $db->connection()->prepare('UPDATE client SET idBic ='.$_POST["bic"].' WHERE idClient='.$_SESSION["id"].')');
                $updateIdBic->execute();
                    //$getid->execute();

            }
            else
            {
                echo    $name_error = "Only letters and white space allowed";
            }
         }
    }
}
