<?php

require("../global.php");
if (isset($_SESSION['loginAdmin'])) {
    if(isset($_POST['date']) && isset($_POST['heuredepart'])) {
        $date = $_POST['date'];
        $hdp = $_POST['heuredepart'];
        $hda = $_POST['heurearrive'];
        $bateau = $_POST['bateau'];
        $capitaine = $_POST['capitaine'];
        $liaison = $_POST['liaison'];
        $idbat = strtok($bateau, ' |');
        $idcap = strtok($capitaine, ' |');
        $idl = strtok($liaison, ' |');

        $reqLiaison = $db->connection()->prepare('SELECT portDepart, portArriver FROM liaison WHERE idLiaison ='. $idl);
        $reqLiaison->execute();

        $dataPort = $reqLiaison->fetch();

        $nomVoyage = $dataPort['portDepart'] . " -> " . $dataPort['portArriver'];

        $reqplace = $db->connection()->prepare("SELECT capaciteBateau FROM bateau WHERE idBateau LIKE '". $idbat . "'");
        $reqplace->execute();

        $databt = $reqplace->fetch();

        $placedispo = $databt['capaciteBateau'];

        $nomQui = $_SESSION['loginAdmin'];
        $Libelle = "Voyage : " . $nomVoyage . " créé";

        $req = $db->connection()->prepare('INSERT INTO traverse (nomTraverse, date, heureDepart, heureArrive, idBateau, idCapitaine, idLiaison, placeDispo) VALUE (?,?,?,?,?,?,?,?)');
        $req->execute([$nomVoyage, $date, $hdp, $hda, $idbat, $idcap, $idl, $placedispo]);



        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$nomQui, $Libelle]);
        header('Location: voyage.php?success=1');


    }
    else {


        header('Location: voyage.php?success=0');


    }

} else {
    header('Location: login.php?success=2');
}
