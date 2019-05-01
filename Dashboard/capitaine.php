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
                                <h4 class="title">Ajouter un Capitaine</h4>
                        <div class="form-group">
                        <form action="createcapitaine.php" method="post">
                            <div class="form-group">
                                <label for="nomCapitaine" class="col-form-label">Nom du capitaine</label>
                                <input type="text" value="<?=@$_POST['nomCapitaine'] ?>" class="form-control" placeholder=" " name="nomCapitaine" id="nomCapitaine" required="">
                            </div>
                            <div class="form-group">
                                <label for="prenomCapitaine" class="col-form-label">Prenom du capitaine</label>
                                <input type="text" value="<?=@$_POST['prenomCapitaine'] ?>"  class="form-control" placeholder=" " name="prenomCapitaine" id="prenomCapitaine" required="">
                            </div>
                            <div class="form-group">
                                <label for="emailCapitaine" class="col-form-label">Email du capitaine</label>
                                <input type="email" value="<?=@$_POST['emailCapitaine'] ?>"  class="form-control" placeholder=" " name="emailCapitaine" id="emailCapitaine" required="">
                            </div>
                            <div class="form-group">
                                <label for="telephoneCapitaine" class="col-form-label">Téléphone du capitaine</label>
                                <input type="number" value="<?@$_POST['telephoneCapitaine']?>" class="form-control" placeholder="" name="telephoneCapitaine" id="telephoneCapitaine">
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
                                    <h4 class="title">Liste des capitaines</h4>
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
                                        $req = $db->connection()->prepare('SELECT * FROM capitaine');
                                        $req->execute();
                                        $rows = $req->rowCount();

                                        ?>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date début</th>
                                            <th>Email</th>
                                            <th>Telephone</th>

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
                                                    <th> <?=$data['idCapitaine']?>  </th>
                                                    <th> <?=$data['nomCapitaine']?> </th>
                                                    <th><?=$data['prenomCapitaine']?></th>
                                                    <th><?=date('m/d/Y', $data['dateDebut']) ?></th>
                                                    <th><?=$data['emailCapitaine']?></th>
                                                    <th><?=$data['telephoneCapitaine']?></th>

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