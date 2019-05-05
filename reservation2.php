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

        $idClient = $_GET['key'];
        $idTraverse = $_GET['idt'];
        $idTarification = $_POST['tarifAge'];

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

        $reqTarif = $db->connection()->prepare('SELECT * FROM tarification WHERE id = '. $idTarification);
        $reqTarif->execute();
        $dataTarif = $reqTarif->fetch();

        if ($data['fidelite'] == 100) {
            $prixFinal = $dataTarif['tarification'] * 0.75;
        }
        else {
            $prixFinal = $dataTarif['tarification'];
        }
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
                                <form method="post" action="reservationsql.php?key=<?= $_SESSION['idClient'] ?>&idt=<?= $_GET['idt']?>&idta=<?=$_POST['tarifAge']?>">
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
                                                <p><?= $dataTrav['distance'] ?>km</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date :</label>
                                                <p><?=$dataTrav['date']?>, Départ à <?= $dataTrav['heureDepart']?>, Arrivée à <?= $dataTrav['heureArrive']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>Bateau : <?= $dataTrav['nom'];?>, Piloté par le capitaine <?= $dataTrav['nomCapitaine'];?></p>
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