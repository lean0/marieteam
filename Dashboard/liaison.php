<!doctype html>
<html lang="en">
<?php
require("../global.php");
if (isset($_SESSION['loginAdmin'])){

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
<body>

<div class="main-panel">
    <?php require ('tpl/navbartop.php');?>

    <?php
$req = $db->connection()->prepare('SELECT nom FROM iledeservie');
$req->execute();
$rw = $req->rowCount();
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="form-group">
                        <form action="createliaison.php" method="post">

                            <label for="port depart" class="col-form-label">Ile de départ</label>
                            <select class="form-control" id="selectPortDepart" name="selectPortDepart" value="<?=@$_POST['selectPortDepart'] ?>">
                            <?php if($rw != 0) {
                        for ($j = 1; $j <= $rw; $j++) {
                        $dt = $req->fetch();
                        echo $dt;
                        ?>
                            <option><?=utf8_encode($dt['nom'])?></option>
                        <?php } } ?>

                            </select>
                        </div>

                    <?php
                    $req2 = $db->connection()->prepare('SELECT nom FROM iledeservie');
                    $req2->execute();
                    $rw2 = $req2->rowCount();
                    ?>
                    <div class="form-group">
                            <label for="port depart" class="col-form-label">Ile d'arrivée</label>
                            <select class="form-control" id="selectPortArriver" name="selectPortArriver" value="<?=@$_POST['selectPortArriver'] ?>">
                                <?php if($rw2 != 0) {
                                    for ($h = 1; $h <= $rw2; $h++) {
                                        $dt2 = $req2->fetch();
                                        ?>
                                        <option><?=utf8_encode($dt2['nom'])?></option>
                                    <?php } } ?>

                            </select>
                    </div>

                            <div class="form-group">
                                <label for="distance" class="col-form-label">Distance KM</label>
                                <input type="number" value="<?=@$_POST['distance'] ?>"  class="form-control" placeholder=" " name="distance" id="distance" required="">
                            </div>

                        <?php
                        $req3 = $db->connection()->prepare('SELECT id, nomSecteur FROM secteur');
                        $req3->execute();
                        $rw3 = $req3->rowCount();
                        ?>
                        <div class="form-group">
                            <label for="secteur" class="col-form-label">Secteur de la liaison</label>
                            <select class="form-control" id="secteur" name="secteur" value="<?= $dt3['id'] ?>">
                                <?php if($rw3 != 0) {
                                    for ($f = 1; $f <= $rw3; $f++) {
                                        $dt3 = $req3->fetch();
                                        ?>
                                        <option><?=$dt3['id']." ".$dt3['nomSecteur']?></option>
                                    <?php } } ?>

                            </select>
                        </div>


                            <div class="form-group">
                            <div class="right-w3l">
                                <input type="submit" class="form-control serv_bottom" value="Validez">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">

                            <div class="header">
                                <h4 class="title">Liste des liaisons</h4>
                            </div>
                            <form>

                                <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                    <script>
                                        $(document).ready(function() {
                                            $('#tabuser').DataTable();
                                        } );
                                    </script>
                                    <?php

                                    $req = $db->connection()->prepare('SELECT * FROM liaison');
                                    $req->execute();
                                    $rows = $req->rowCount();

                                    ?>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Port Départ</th>
                                        <th>Port Arrivé</th>
                                        <th>Distance KM</th>
                                        <th>Secteur</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //print_r($data);
                                    if ($rows != 0) {
                                        for ($i = 1; $i <= $rows; $i++) {
                                            $data = $req->fetch();
                                            ?>
                                            <tr>
                                                <th> <?=$data['idLiaison']?>  </th>
                                                <th> <?=$data['portDepart']?> </th>
                                                <th><?=$data['portArriver']?></th>
                                                <th><?=$data['distance']?></th>
                                                <th><?=$data['idSecteur'] ?></th>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo "no user found";
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







<?php
require("tpl/footer.php");
?>

</div>
</div>


</body>



</html>
<?php } else {
    header('Location: login.php?success=2');
}?>