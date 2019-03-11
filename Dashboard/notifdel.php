<?php

require("../global.php");
if($_GET['id'] != "*" ) {

    $req = $db->connection()->prepare('DELETE FROM notifications WHERE id =:idtodl');
    $req->execute(array( ":idtodl" => $_GET['id'] ));
    header('Location: notif.php?success=1');
}
else if ($_GET['id'] = "*")
{
    $req = $db->connection()->prepare('DELETE FROM notifications');
    $req->execute();
    header('Location: notif.php?success=1');
}
else {


    header('Location: notif.php?success=0');


}
