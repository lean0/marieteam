<!doctype html>
<html lang="en">
<?php
require("../global.php");
if (isset($_SESSION['login'])){
require("tpl/header.php");
require("tpl/navbar.php");

?>
<body>



<div class="main-panel">
    <?php require ('tpl/navbartop.php');?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Ajouter un voyage</h4>
                            <form action="createvoyage.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nom du voyage</label>
                                    <input type="text" value="<?=@$_POST['nomVoyage'] ?>" class="form-control" placeholder=" " name="nomVoyage" id="nomVoyage" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">date</label>
                                    <input type="date" value="<?=@$_POST['date'] ?>"  class="form-control" placeholder=" " name="date" id="date" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-email" class="col-form-label">Heure Depart</label>
                                    <input type="text" value="<?=@$_POST['heuredepart'] ?>"  class="form-control" placeholder=" " name="heuredepart" id="heuredepart" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-email" class="col-form-label">Heure Arriver</label>
                                    <input type="text" value="<?=@$_POST['heurearrive'] ?>"  class="form-control" placeholder=" " name="heurearrive" id="heurearrive" required="">
                                </div>
                                <?php
                                $req = $db->connection()->prepare('SELECT idBateau, nom, capaciteBateau FROM bateau');
                                $req->execute();
                                $rw = $req->rowCount();
                                ?>
                                <div class="form-group">
                                    <label for="secteur" class="col-form-label">Bateau</label>
                                    <select class="form-control" id="bateau" name="bateau" value="<?= $dt['idBateau'] ?>">
                                        <?php if($rw != 0) {
                                            for ($i = 1; $i <= $rw; $i++) {
                                                $dt = $req->fetch();
                                                ?>
                                                <option><?=$dt['idBateau']." ".$dt['nom']." ".$dt['capaciteBateau']?></option>
                                            <?php } } ?>

                                    </select>
                                </div>

                                <?php
                                $req1 = $db->connection()->prepare('SELECT idCapitaine, nomCapitaine FROM capitaine');
                                $req1->execute();
                                $rw1 = $req1->rowCount();
                                ?>
                                <div class="form-group">
                                    <label for="capitaine" class="col-form-label">Capitaine</label>
                                    <select class="form-control" id="capitaine" name="capitaine" value="<?= $dt2['idCapitaine'] ?>">
                                        <?php if($rw1 != 0) {
                                            for ($f = 1; $f <= $rw1; $f++) {
                                                $dt2 = $req1->fetch();
                                                ?>
                                                <option><?=$dt2['idCapitaine']." ".$dt2['nomCapitaine']?></option>
                                            <?php } } ?>

                                    </select>
                                </div>

                                <?php
                                $req2 = $db->connection()->prepare('SELECT * FROM liaison');
                                $req2->execute();
                                $rw2 = $req2->rowCount();
                                ?>
                                <div class="form-group">
                                    <label for="liaison" class="col-form-label">Liaison</label>
                                    <select class="form-control" id="liaison" name="liaison" value="<?= $dt3['idLiaison'] ?>">
                                        <?php if($rw2 != 0) {
                                            for ($g = 1; $g <= $rw2; $g++) {
                                                $dt3 = $req2->fetch();
                                                ?>
                                                <option><?=$dt3['idLiaison']." ".$dt3['portDepart']." ".$dt3['portArriver']?></option>
                                            <?php } } ?>

                                    </select>
                                </div>


                                <br class="right-w3l">
                                <input type="submit" class="form-control serv_bottom" value="Ajouter"></br>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Liste des voyages</h4>

                            <table class="table table-striped table-bordered" id="test" style="width:100%">
                                <script>
                                    $(document).ready(function() {
                                        $('#test').DataTable();
                                    } );
                                </script>
                                <div class="Tableau">
                                    <?php
                                    $req = $db->connection()->prepare('SELECT * FROM traverse');
                                    $req->execute();
                                    $rows = $req->rowCount();

                                    ?>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom voyage</th>
                                        <th>date</th>
                                        <th>heure depart</th>
                                        <th>heure arrive</th>
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
                                                <th> <?=$data['idTraverse']?></th>
                                                <th> <?=$data['nomTraverse']?> </th>
                                                <th> <?=$data['date'] ?></th>
                                                <th> <?=$data['heureDepart'] ?></th>
                                                <th><?=$data['heureArrive'] ?></th>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else{
                                        if ($rows == 0) {
                                            echo "Base de donnée vide";
                                        }
                                    }

                                    ?>
                                </div>
                                </tbody>

                            </table>
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