<?php

require("../global.php");
if(isset($_POST['idtodel'])) {

   $idtodl = $_POST['idtodel'];

   $req = $db->connection()->prepare('DELETE FROM notifications WHERE id =:idtodl');
    $req->execute(array( ":idtodl" => $_POST['idtodel'] ));


    header('Location: notif.php?success=1');


}
else {


   header('Location: notif.php?success=0');


}
