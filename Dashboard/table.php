<?php
require("../global.php");
if (isset($_SESSION['login'])){
?>
<!doctype html>
<html lang="en">
<?php
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
                            <div class="card">
                                <h4 class="title">Ajouter un bateau</h4>
                                <form action="createbateau.php" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nom</label>
                                        <input type="text" value="<?=@$_POST['nom'] ?>" class="form-control" placeholder=" " name="nom" id="nom" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Type</label>
                                        <input type="text" value="<?=@$_POST['typeBateau'] ?>"  class="form-control" placeholder=" " name="typeBateau" id="typeBateau" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-email" class="col-form-label">Capacité</label>
                                        <input type="text" value="<?=@$_POST['capaciteBateau'] ?>"  class="form-control" placeholder=" " name="capaciteBateau" id="mail" required="">
                                    </div>
                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                            <h4 class="title">Liste des comptes</h4>
                        </div>


                            <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                <script>
                                    $(document).ready(function() {
                                        $('#tabuser').DataTable();
                                    } );
                                </script>
                                <div class="Tableau">
                                <?php
                                $req = $db->connection()->prepare('SELECT * FROM bateau');
                                $req->execute();
                                $rows = $req->rowCount();

                                ?>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th>Capacité</th>
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
                                            <th> <?=$data['idBateau']?></th>
                                            <th> <?=$data['nom']?> </th>
                                            <th> <?=$data['typeBateau'] ?></th>
                                            <th> <?=$data['capaciteBateau'] ?></th>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    if ($rows == 0) {

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
</div>
</div>

</div>
</div>

<?php
require_once('tpl/footer.php');
?>
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
<?php } ?>