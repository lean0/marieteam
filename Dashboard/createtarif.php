<?php
require("../global.php");
if (isset($_SESSION['login'])) {
    if (isset($_POST['nomCatégorie'])){

        $nomQui = $_SESSION['login'];
        $Libelle = "ADMIN : " . $nomQui . " créé";
        $nomCat = $_POST['nomCatégorie'];




            $req = $db->connection()->prepare('INSERT INTO categorietarification (libelle) VALUE (?)');
            $req->execute([$nomCat]);

            $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
            $req2->execute([$nomQui, $Libelle]);
            header('Location: Tarification.php?success=1');
        }
     elseif(isset($_POST['nomTarification']) && isset($_POST['cat'])){
        $nomTarif = $_POST['nomTarification'];
        $cat = $_POST['cat'];
        $nomQui = $_SESSION['login'];
        $Libelle = "ADMIN : " . $nomQui . " créé";
        $idcat = $cat[0];
        $req = $db->connection()->prepare('INSERT INTO typetarif (libelle, idCategorie) VALUE (?,?)');
        $req->execute([$nomTarif, $cat]);

        $req2 = $db->connection()->prepare('INSERT INTO notifications (nomQui, Libelle) VALUE (?,?)');
        $req2->execute([$idcat, $Libelle]);
         header('Location: Tarification.php?success=1');


     }
     elseif(isset($_POST['dateDebut']) && isset($_POST['dateFin'])){
        $datedeb = $_POST['dateDebut'];
        $datefin = $_POST['dateFin'];
        $li = $_POST['li'];
        $idli = $li[0];

         $req = $db->connection()->prepare('INSERT INTO periode (dateDebut, dateFin, idLiaison) VALUE (?,?,?)');
         $req->execute([$datedeb, $datefin, $idli]);
         header('Location: Tarification.php?success=1');



     }
     elseif(isset($_POST['periode']) && isset($_POST['typetarif']) && isset($_POST['montant'])){
        $periode = $_POST['periode'];
        $idp = $periode[0];
        $typetarif = $_POST['typetarif'];
        $idtf = $typetarif[0];
        $montant = $_POST['montant'];

         $req = $db->connection()->prepare('INSERT INTO tarification (idType, idPeriode, tarification) VALUE (?,?,?)');
         $req->execute([$idp, $idtf, $montant]);
         header('Location: Tarification.php?success=1');

     }
    else{
        header('Location: Tarification.php?success=0');
    }
    }

?>