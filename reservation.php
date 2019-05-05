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
        $_SESSION['idTraverse'] = $idTraverse;

        $todayDate = date("Y-m-d");

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
                                <form method="post" action="reservation2.php?idt=<?= $_GET['idt']?>">
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
                                                if ($data['fidelite'] == 100) {
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

                                                $reqPeriodeDate = $db->connection()->prepare('SELECT id, dateDebut, dateFin, idLiaison FROM periode WHERE idLiaison = '. $dataTrav['idLiaison']);
                                                $reqPeriodeDate->execute();

                                                $dataPeriode = $reqPeriodeDate->fetch();
                                                $periode1Start = strtotime($dataPeriode['dateDebut']);
                                                $periode1End = strtotime($dataPeriode['dateFin']);
                                                $idPeriode1 = $dataPeriode['id'];

                                                $dataPeriode = $reqPeriodeDate->fetch();
                                                $periode2Start = strtotime($dataPeriode['dateDebut']);
                                                $periode2End = strtotime($dataPeriode['dateFin']);
                                                $idPeriode2 = $dataPeriode['id'];

                                                $dataPeriode = $reqPeriodeDate->fetch();
                                                $periode3Start = strtotime($dataPeriode['dateDebut']);
                                                $periode3End = strtotime($dataPeriode['dateFin']);
                                                $idPeriode3 = $dataPeriode['id'];

                                                $travDate = $dataTrav['date'];
                                                $travDate = strtotime($travDate);

                                                $todayPeriode = $idPeriode1;
                                                $_SESSION['periode'] = $todayPeriode;

                                                if (($travDate > $periode1Start) && ($travDate < $periode1End)) {
                                                    $todayPeriode = $idPeriode1;
                                                }
                                                elseif (($travDate > $periode2Start) && ($travDate < $periode2End)) {
                                                    $todayPeriode = $idPeriode2;
                                                }
                                                elseif (($travDate > $periode3Start) && ($travDate < $periode3End)) {
                                                    $todayPeriode = $idPeriode3;
                                                }

                                                $reqTarif = $db->connection()->prepare('SELECT * FROM tarification 
                                                                                                  WHERE idPeriode = ' .$todayPeriode);
                                                $reqTarif->execute();
                                                $rowsTarif = $reqTarif->rowCount();
                                                $dataTarif = $reqTarif->fetch();



                                                if ($dataTrav['placeDispo'] >= 9) {
                                                    $maxIndexP = 10;
                                                }
                                                else {
                                                    $maxIndexP = $dataTrav['placeDispo'] + 1;
                                                }

                                                if ($dataTrav['placeDispoV'] >= 9) {
                                                    $maxIndexV = 10;
                                                }
                                                else {
                                                    $maxIndexV = $dataTrav['placeDispoV'] + 1;
                                                }
                                                if ($dataTrav['placeDispoC'] >= 9) {
                                                    $maxIndexC = 10;
                                                }
                                                else {
                                                    $maxIndexC = $dataTrav['placeDispoC'] + 1;
                                                }
                                                ?>



                                                <label>Tarif</label><br>
                                                <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                                    <tr>
                                                        <td></td>
                                                        <td>Tarif en €</td>
                                                        <td>Place Dispo.</td>
                                                        <td>Qté</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Adulte</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispo']?></td>
                                                        <td>
                                                            <select name="nbAdulte" id="nbAdulte">
                                                                <?php

                                                                for ($i1=0; $i1 < $maxIndexP; $i1++) {

                                                                    ?>
                                                                    <option><?=$i1?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Junior 8 à 18 ans</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispo']?></td>
                                                        <td>
                                                            <select name="nbJunior" id="nbJunior">
                                                                <?php

                                                                for ($i2=0; $i2 < $maxIndexP; $i2++) {

                                                                    ?>
                                                                    <option><?=$i2?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Enfant 0 à 7 ans</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispo']?></td>
                                                        <td>
                                                            <select name="nbEnfant" id="nbEnfant">
                                                                <?php

                                                                for ($i3=0; $i3 < $maxIndexP; $i3++) {

                                                                    ?>
                                                                    <option><?=$i3?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Voiture long.in.4m</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispoV']?></td>
                                                        <td>
                                                            <select name="nbVoit4m" id="nbVoit4m">
                                                                <?php

                                                                for ($i4=0; $i4 < $maxIndexV; $i4++) {

                                                                    ?>
                                                                    <option><?=$i4?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Voiture long.in.5m</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispoV']?></td>
                                                        <td>
                                                            <select name="nbVoit5m" id="nbVoit5m">
                                                                <?php

                                                                for ($i5=0; $i5 < $maxIndexV; $i5++) {

                                                                    ?>
                                                                    <option><?=$i5?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Fourgon</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispoC']?></td>
                                                        <td>
                                                            <select name="nbFourg" id="nbFourg">
                                                                <?php

                                                                for ($i6=0; $i6 < $maxIndexC; $i6++) {

                                                                    ?>
                                                                    <option><?=$i6?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Camping Car</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispoC']?></td>
                                                        <td>
                                                            <select name="nbCCar" id="nbCCar">
                                                                <?php

                                                                for ($i7=0; $i7 < $maxIndexC; $i7++) {

                                                                    ?>
                                                                    <option><?=$i7?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Camion</td>
                                                        <td><?=$dataTarif['tarification']?>€</td>
                                                        <td><?=$dataTrav['placeDispoC']?></td>
                                                        <td>
                                                            <select name="nbCamion" id="nbCamion">
                                                                <?php

                                                                for ($i8=0; $i8 < $maxIndexC; $i8++) {

                                                                    ?>
                                                                    <option><?=$i8?></option>
                                                                    <?php
                                                                }
                                                                $dataTarif = $reqTarif->fetch();
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
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