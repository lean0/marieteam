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

        $req = $db->connection()->prepare('SELECT idClient, nom, prenom, mail, password, dateInscription, fidelite FROM client WHERE idClient = ' . $idClient);
        $req->execute();
        $data = $req->fetch();

        $reqTrav = $db->connection()->prepare('
                                      SELECT * FROM traverse
                                      INNER JOIN liaison
                                      WHERE traverse.idLiaison = liaison.idLiaison
                                      AND traverse.idTraverse = ' . $idTraverse);
        $reqTrav->execute();
        $dataTrav = $reqTrav->fetch();
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
                                <form method="post" action="reservation2.php?key=<?= $_SESSION['idClient'] ?>&idt=<?= $_GET['idt']?>">
                                    <p>Vos informations</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <p><?= $data['nom'] ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <p><?= $data['prenom'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p><?= $data['mail'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                if ($data['fidelite'] = 100) {
                                                    ?>
                                                    <p>Vos points de fidélité : 100 (Vous aurez 25% de réduction sur cette réservation)</p>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <p>Vos points de fidélité : <?= $data["fidelite"]; ?> (25% de
                                                        réduction à 100 points)</p>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?php
                                                $reqTarif = $db->connection()->prepare('SELECT * FROM tarification 
                                                                                                  INNER JOIN categorietarification
                                                                                                  WHERE tarification.idType = categorietarification.id
                                                                                                  ');
                                                $reqTarif->execute();
                                                $rowsTarif = $reqTarif->rowCount();



                                                ?>
                                                <label>Tarif</label><br>
                                                <select name="tarifAge" id="tarifAge">
                                                    <option value="1">-- Tarif --</option>
                                                    <?php
                                                    if ($rowsTarif != 0) {
                                                        for ($i = 1; $i <= $rowsTarif; $i++) {
                                                            $dataTarif = $reqTarif->fetch();
                                                            ?>
                                                            <option value="<?= $dataTarif['id']; ?>"><?= $dataTarif['libelle'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Suivant ></button>
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