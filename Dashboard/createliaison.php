<?php

require("../global.php");

if(isset($_POST['selectPortDepart']) && isset($_POST['selectPortArriver']) && isset($_POST['distance'])) {
    $SPD = $_POST['selectPortDepart'];
    $SPA = $_POST['selectPortArriver'];
    $distance = $_POST['distance'];

    $req = $db->connection()->prepare('INSERT INTO liaison (portDepart, portArriver, distance) VALUE (?,?,?)');
    $req->execute([$SPD, $SPA, $distance]);
    $success=1;

    header('Location: liaison.php?success=1');


}
else {
    header('Location: liaison.php?success=0');
}


