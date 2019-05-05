<?php
require("global.php");
if (isset($_SESSION['login'])){
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
        require ('tpl/navbartopC.php');


        //Récup l'id du client
        $idClient = $_GET['key'];

        //Récup les données du client
        $req = $db->connection()->prepare('SELECT idClient, nom, prenom, mail, password, dateInscription, fidelite FROM client WHERE idClient = ' . $idClient);
        $req->execute();
        $data = $req->fetch();

        //Récup la liste des réservations du client
        $reqRes = $db->connection()->prepare('SELECT libelleReservation, prix, periode, libelleTarification FROM reservation WHERE idClient = ' . $idClient);
        $reqRes->execute();
        $rowsRes = $reqRes->rowCount();
        $dataRes = $reqRes->fetch();


        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Votre profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <p>Vos informations</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <p><?=$data['nom']?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <p><?=$data['prenom']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p><?=$data['mail']?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>MarieTeam</h4>
                                            <div class="form-group">
                                                <label>Inscrit depuis le</label>
                                                <p><?=date('d/m/Y', $data['dateInscription']) ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p>Vos points de fidélité : <?= $data["fidelite"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="card">
                            <div class="header">
                                <?php
                                if (isset($_GET['error']) && $_GET['error'] = 1) {
                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                    echo "<strong>Attention !</strong> Les motes de passes de sont pas identiques.";
                                    echo "</div>";
                                }
                                ?>
                                <h4 class="title">Modifier vos informations</h4>
                            </div>
                            <div class="content">
                                <form action="session/editusersqlC.php?key=<?=$idClient?>" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nomUser" class="form-control" value="<?=$data['nom']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" name="prenomUser" class="form-control" value="<?=$data['prenom']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="mailUser" class="form-control" value="<?=$data['mail']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nouvelle ligne -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><u>Mot de passe</u></p>
                                            <div class="form-group">
                                                <label>Nouveau mot de passe</label>
                                                <input type="password" name="passwordC" class="form-control" placeholder="Nouveau mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirmer le nouveau mot de passe</label>
                                                <input type="password" class="form-control" name="passwordConfC" placeholder="Confirmer le nouveau mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Modifier vos informations</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>


                        <div class="card" id="Historique">
                            <div class="header">
                                <h4 class="title">Historique de réservations</h4>
                            </div>
                            <div class="content">
                                <table class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Libelle</th>
                                        <th>Tarif</th>
                                        <th>Prix</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ($rowsRes != 0) {
                                        for ($i = 1; $i <= $rowsRes; $i++) {
                                            $data = $req->fetch();
                                            ?>
                                            <tr>
                                                <th> <?=$dataRes['libelleReservation']?>  </th>
                                                <th> <?=$dataRes['libelleTarification']?> </th>
                                                <th> <?=$dataRes['prix'] ?></th>
                                                <th> <?=$dataRes['periode'] ?></th>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo "Vous n'avez effectué aucune réservation :'(";
                                    }
                                    ?>
                                    </tbody>
                                </table>
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