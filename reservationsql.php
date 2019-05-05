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
        $idTarification = $_GET['idta'];

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

        $reqTarif = $db->connection()->prepare('SELECT * FROM tarification
                                                          INNER JOIN categorietarification
                                                          WHERE tarification.idType = categorietarification.id
                                                          AND tarification.id = '. $idTarification
        );
        $reqTarif->execute();
        $dataTarif = $reqTarif->fetch();

        $prixFinal = $dataTarif['tarification'];
        $libelleReservation = "Trajet " . $dataTrav['portDepart']. " -> " . $dataTrav['portArriver'];
        $dateReservation = date("d/m/Y");
        $libelleTarification = $dataTarif['libelle'];

        $reqInsert = $db->connection()->prepare('INSERT INTO reservation (idClient, idTraverse, libelleReservation, prix, periode, libelleTarification) VALUE (?,?,?,?,?,?)');
        $reqInsert->execute([$idClient, $idTraverse, $libelleReservation, $prixFinal, $dateReservation, $libelleTarification]);



        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="header">
                                <h2 class="title">Merci !</h2>
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