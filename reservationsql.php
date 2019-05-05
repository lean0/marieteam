<?php
require("global.php");
if (isset($_SESSION['login'])) {
    ?>
    <!doctype html>
    <html lang="en">
    <?php
    require("tpl/navbarC.php");
    require("tpl/headerC.php");
    ?>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <body>
    <div class="main-panel">
        <?php
        require('tpl/navbartopC.php');

        $idClient = $_SESSION['idClient'];
        $idTraverse = $_GET['idt'];
        $prixFinal = $_SESSION['prix'];
        $idPeriode = $_SESSION['periode'];

        $req = $db->connection()->prepare('SELECT idClient, nom, prenom, mail, password, dateInscription, fidelite FROM client WHERE idClient = ' . $idClient);
        $req->execute();
        $data = $req->fetch();

        $reqTrav = $db->connection()->prepare('
                                      SELECT * FROM traverse
                                      INNER JOIN liaison
                                      INNER JOIN bateau
                                      INNER JOIN capitaine
                                      WHERE traverse.idBateau = bateau.idBateau
                                      AND traverse.idCapitaine = capitaine.idCapitaine
                                      AND traverse.idLiaison = liaison.idLiaison
                                      AND traverse.idTraverse = ' . $idTraverse);
        $reqTrav->execute();
        $dataTrav = $reqTrav->fetch();


        if ($data['fidelite'] >= 100) {
            $reqResFidel = $db->connection()->prepare('UPDATE client SET fidelite = fidelite-100 WHERE idClient = '. $idClient);
            $reqResFidel->execute();
        }

        $libelleReservation = "Trajet " . $dataTrav['portDepart']. " -> " . $dataTrav['portArriver'];
        $dateReservation = date("d/m/Y");


        $idPeriode = $_SESSION['periode'];

        $nbAdulte = $_SESSION['nbAdulte'];

        $nbJunior = $_SESSION['nbJunior'];

        $nbEnfant = $_SESSION['nbEnfant'];

        $nbVoit4m = $_SESSION['nbVoit4m'];

        $nbVoit5m = $_SESSION['nbVoit5m'];

        $nbFourg = $_SESSION['nbFourg'];

        $nbCCar = $_SESSION['nbCCar'];

        $nbCamion = $_SESSION['nbCamion'];

        $reqTarif = $db->connection()->prepare('SELECT * FROM tarification WHERE idPeriode = '. $idPeriode);
        $reqTarif->execute();
        $dataTarif = $reqTarif->fetch();

        if ($nbAdulte > 0) {
            $libelleTarification = "Ticket adulte";
            $prix = $dataTarif['tarification'];
            $idTarif = 1;
            for ($i = 0; $i < $nbAdulte; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbJunior > 0) {
            $libelleTarification = "Ticket Junior";
            $prix = $dataTarif['tarification'];
            $idTarif = 1;
            for ($i = 0; $i < $nbJunior; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbEnfant > 0) {
            $libelleTarification = "Ticket Enfant";
            $prix = $dataTarif['tarification'];
            $idTarif = 1;
            for ($i = 0; $i < $nbEnfant; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbVoit4m > 0) {
            $libelleTarification = "Ticket Voiture inf.4m";
            $prix = $dataTarif['tarification'];
            $idTarif = 2;
            for ($i = 0; $i < $nbVoit4m; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbVoit5m > 0) {
            $libelleTarification = "Ticket Voiture inf.5m";
            $prix = $dataTarif['tarification'];
            $idTarif = 2;
            for ($i = 0; $i < $nbVoit5m; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbFourg > 0) {
            $libelleTarification = "Ticket Fourgon";
            $prix = $dataTarif['tarification'];
            $idTarif = 3;
            for ($i = 0; $i < $nbFourg; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbCCar > 0) {
            $libelleTarification = "Ticket Camping Car";
            $prix = $dataTarif['tarification'];
            $idTarif = 3;
            for ($i = 0; $i < $nbCCar; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        if ($nbCamion > 0) {
            $libelleTarification = "Ticket Camion";
            $prix = $dataTarif['tarification'];
            $idTarif = 3;
            for ($i = 0; $i < $nbCamion; $i++) {
                $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, idTarif, libelleTarification) VALUE (?,?,?,?,?,?,?)');
                $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prix, $dateReservation, $idTarif, $libelleTarification]);
            }
            $dataTarif = $reqTarif->fetch();
        }
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="header">
                                <h2 class="title">Merci !</h2>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p> Votre réservation a été confirmée !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
        </div>
    </footer>
    </body>
    <script src="Dashboard/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="Dashboard/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="Dashboard/assets/js/chartist.min.js"></script>
    <script src="Dashboard/assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="Dashboard/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="Dashboard/assets/js/demo.js"></script>
    </html>
<?php } else {
    header('Location: index.php');
} ?>