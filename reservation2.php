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
        $idPeriode = $_SESSION['periode'];
        $nbAdulte = $_POST['nbAdulte'];
        $_SESSION['nbAdulte'] = $nbAdulte;
        $nbJunior = $_POST['nbJunior'];
        $_SESSION['nbJunior'] = $nbJunior;
        $nbEnfant = $_POST['nbEnfant'];
        $_SESSION['nbEnfant'] = $nbEnfant;
        $nbVoit4m = $_POST['nbVoit4m'];
        $_SESSION['nbVoit4m'] = $nbVoit4m;
        $nbVoit5m = $_POST['nbVoit5m'];
        $_SESSION['nbVoit5m'] = $nbVoit5m;
        $nbFourg = $_POST['nbFourg'];
        $_SESSION['nbFourg'] = $nbFourg;
        $nbCCar = $_POST['nbCCar'];
        $_SESSION['nbCCar'] = $nbCCar;
        $nbCamion = $_POST['nbCamion'];
        $_SESSION['nbCamion'] = $nbCamion;

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

        $reqTarif = $db->connection()->prepare('SELECT * FROM tarification WHERE idPeriode = '. $idPeriode);
        $reqTarif->execute();
        $dataTarif = $reqTarif->fetch();

        $prixFinal = 0;
        $prixFinal = ($prixFinal + ($nbAdulte * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbJunior * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbEnfant * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbVoit4m * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbVoit5m * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbFourg * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbCCar * $dataTarif['tarification']));
        $dataTarif = $reqTarif->fetch();
        $prixFinal = ($prixFinal + ($nbCamion * $dataTarif['tarification']));

        if ($data['fidelite'] >= 100) {
            $prixFinal = $prixFinal * 0.75;
        }
        else {
            $prixFinal = $prixFinal * 1;
        }
        $_SESSION['prix'] = $prixFinal;
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Réservations</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="reservationsql.php?idt=<?= $_GET['idt']?>">
                                    <p>Informations</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Trajet</label>
                                                <p><?= $dataTrav['portDepart'] ?> -> <?= $dataTrav['portArriver']?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Distance</label>
                                                <p><?= $dataTrav['distance'] ?> miles marin</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date :</label>
                                                <p><?=$dataTrav['date']?>, Départ à <?= $dataTrav['heureDepart']?>,<br> Arrivée estimée à <?= $dataTrav['heureArrive']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>Bateau : <?= $dataTrav['nom'];?>, Piloté par le capitain <?= $dataTrav['nomCapitaine'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php
                                                ?>
                                                <h3>Prix : <?= $prixFinal ?>€</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Réserver</button>
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