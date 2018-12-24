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

                        <div class="card">
                            <div class="header">
                            <h4 class="title">Ajouter une Ile</h4>
                            </div>
                            <form action="createile.php" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nom</label>
                                    <input type="text" value="<?=@$_POST['nomIle'] ?>" class="form-control" placeholder=" " name="nomIle" id="nomIle" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nom du Port</label>
                                    <input type="text" value="<?=@$_POST['nomPort'] ?>" class="form-control" placeholder=" " name="nomPort" id="nomPort" required="">
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control serv_bottom" value="Ajouter"  onclick="demo.showError('top','right')">
                                </div>
                            </form>
                        </div>


                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Liste des Iles</h4>
                        </div>
                            <table id="tabuser" class="table table-striped table-bordered"style="width:100%">

                                <script>
                                    $(document).ready(function() {
                                        $('#tabuser').DataTable();
                                    } );
                                </script>
                                <?php
                                $isDbEmpty = 0;
                                $req = $db->connection()->prepare('SELECT * FROM iledeservie');
                                $req->execute();
                                $rows = $req->rowCount();

                                ?>
                                <thead>
                                <tr >
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Nom du port</th>
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
                                            <th> <?=$data['idIle']?>  </th>
                                            <th> <?=$data['nom']?> </th>
                                            <th> <?=$data['nomPort']?> </th>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    $isDbEmpty = 1;
                                }
                                if ($isDbEmpty == 1) {
                                    echo '<body onload="demo.showEmptyDB(\'top\',\'right\')">';
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
</div>
</div>

<?php require('tpl/footer.php'); ?>

</div>
</div>


</body>

<!--   Core JS Files   -->


</html>
<?php } else {
    header('Location: login.php?success=2');
}?>