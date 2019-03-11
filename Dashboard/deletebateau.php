<?php

require("../global.php");
if(isset($_GET['id'])) {


   $req = $db->connection()->prepare('DELETE FROM bateau WHERE idBateau =:idtodl');
    $req->execute(array( ":idtodl" => $_GET['id'] ));


    header('Location: bateau.php?success=1');


}
else {


   header('Location: bateau.php?success=0');


}
