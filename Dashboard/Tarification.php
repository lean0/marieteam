<!doctype html>
<html lang="en">
<?php
require("../global.php");
if (isset($_SESSION['login'])){


require("tpl/header.php");
require("tpl/navbar.php");
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        echo '<body onload="demo.showSucess(\'top\',\'right\')">';
    }
    else {
        if ($_GET['success'] == 0) {
            echo '<body onload="demo.showError(\'top\',\'right\')">';
        }
    }
}
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>

<div class="main-panel">
    <?php require ('tpl/navbartop.php');?>



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Catégorie Tarification</h4>
                            <div class="form-group">
                                <form action="createtarif.php" method="post">
                                    <div class="form-group">
                                        <label for="nomCatégorie" class="col-form-label">Nom de la catégorie</label>
                                        <input type="text" value="<?=@$_POST['nomCatégorie'] ?>" class="form-control" placeholder=" " name="nomCatégorie" id="nomCatégorie" required="">
                                    </div>
                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Validez">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Type Tarification</h4>
                            <div class="form-group">
                                <form action="createtarif.php" method="post">
                                    <div class="form-group">
                                        <label for="nomTarification" class="col-form-label">Nom de la tarification</label>
                                        <input type="text" value="<?=@$_POST['nomTarification'] ?>" class="form-control" placeholder=" " name="nomTarification" id="nomTarification" required="">
                                    </div>
                                    <?php
                                    $req = $db->connection()->prepare('SELECT * FROM categorietarification');
                                    $req->execute();
                                    $rw = $req->rowCount();
                                    ?>
                                    <div class="form-group">
                                        <label for="cat" class="col-form-label">catégorie tarification</label>
                                        <select class="form-control" id="cat" name="cat" value="<?= $dt['cat'] ?>">
                                            <?php if($rw != 0) {
                                                for ($i = 1; $i <= $rw; $i++) {
                                                    $dt = $req->fetch();
                                                    ?>
                                                    <option><?=$dt['id']." ".$dt['libelle']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>

                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Validez">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Période de tarification</h4>
                            <div class="form-group">
                                <form action="createtarif.php" method="post">
                                    <div class="form-group">
                                        <label for="dateDebut" class="col-form-label">Date de début de la tarification</label>
                                        <input type="date" value="<?=@$_POST['dateDebut'] ?>" class="form-control" placeholder=" " name="dateDebut" id="dateDebut" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="dateFin" class="col-form-label">Date de fin de la tarification</label>
                                        <input type="date" value="<?=@$_POST['dateDebut'] ?>" class="form-control" placeholder=" " name="dateFin" id="dateFin" required="">
                                    </div>

                                    <?php
                                    $req2 = $db->connection()->prepare('SELECT * FROM liaison');
                                    $req2->execute();
                                    $rw2 = $req2->rowCount();
                                    ?>
                                    <div class="form-group">
                                        <label for="li" class="col-form-label">Liaison</label>
                                        <select class="form-control" id="li" name="li" value="<?= $dt3['idLiaison'] ?>">
                                            <?php if($rw2 != 0) {
                                                for ($g = 1; $g <= $rw2; $g++) {
                                                    $dt3 = $req2->fetch();
                                                    ?>
                                                    <option><?=$dt3['idLiaison']." ".$dt3['portDepart']." ".$dt3['portArriver']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>

                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Validez">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Crée une tarification</h4>
                            <div class="form-group">
                                <form action="createtarif.php" method="post">



                                    <?php
                                    $req = $db->connection()->prepare('SELECT id, dateDebut, dateFin FROM periode');
                                    $req->execute();
                                    $rw = $req->rowCount();
                                    ?>
                                    <div class="form-group">
                                        <label for="periode" class="col-form-label">Période</label>
                                        <select class="form-control" id="periode" name="periode" value="<?= $dt['idPériode'] ?>">
                                            <?php if($rw != 0) {
                                                for ($i = 1; $i <= $rw; $i++) {
                                                    $dt = $req->fetch();
                                                    ?>
                                                    <option><?=$dt['id']." ".$dt['dateDebut']." ".$dt['dateFin']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>

                                    <?php
                                    $req = $db->connection()->prepare('SELECT id, libelle FROM typetarif');
                                    $req->execute();
                                    $rw = $req->rowCount();
                                    ?>
                                    <div class="form-group">
                                        <label for="typetarif" class="col-form-label">Type tarification</label>
                                        <select class="form-control" id="typetarif" name="typetarif" value="<?= $dt['idTarification'] ?>">
                                            <?php if($rw != 0) {
                                                for ($i = 1; $i <= $rw; $i++) {
                                                    $dt = $req->fetch();
                                                    ?>
                                                    <option><?=$dt['id']." ".$dt['libelle']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dateDebut" class="col-form-label">Montant</label>
                                        <input type="number" value="<?=@$_POST['montant'] ?>" class="form-control" placeholder=" " name="montant" id="montant" required="">
                                    </div>

                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Validez">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste des Tarifications</h4>
                            </div>
                            <form>

                                <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                    <script>
                                        $(document).ready(function() {
                                            $('#tabuser').DataTable();
                                        } );
                                    </script>
                                    <?php
                                    $isDbEmpty = 0;
                                    $req = $db->connection()->prepare('SELECT * FROM tarification');
                                    $req->execute();
                                    $rows = $req->rowCount();
                                    ?>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tarif</th>
                                        <th>date debut</th>
                                        <th>date fin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //print_r($data);
                                    if ($rows != 0) {
                                        for ($i = 1; $i <= $rows; $i++) {
                                            $data = $req->fetch();
                                            $req2 = $db->connection()->prepare('SELECT * FROM periode WHERE ? = id');
                                            $req2->execute([$data['idPeriode']]);
                                            $data2 = $req2->fetch();
                                            ?>
                                            <tr>
                                                <th> <?=$data['id']?>  </th>
                                                <th> <?=$data['tarification']?> </th>
                                                <th> <?= $data2['dateDebut'] ?></th>
                                                <th> <?= $data2['dateFin'] ?></th>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo '<body onload="demo.showEmptyDB(\'top\',\'right\')">';
                                    }



                                    ?>
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<?php
require("tpl/footer.php");
?>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
<?php }else {
    header('Location: login.php?success=2');
} ?>