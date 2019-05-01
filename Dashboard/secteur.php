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
            echo '<body onload="demo.showErrorExist(\'top\',\'right\')">';
        }
    }
}
?>
<body>

<div class="main-panel">
    <?php require ('tpl/navbartop.php');?>



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form action="createsecteur.php" method="post">
                            <div class="form-group">
                                <label for="secteur" class="col-form-label">Secteur</label>
                                <input type="text" value="<?=@$_POST['nomSecteur'] ?>"  class="form-control" placeholder=" " name="secteur" id="secteur" required="">
                            </div>
                            <div class="right-w3l">
                                <input type="submit" class="form-control serv_bottom" value="Validez">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Liste des comptes</h4>
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
                                    $req = $db->connection()->prepare('SELECT * FROM secteur');
                                    $req->execute();
                                    $rows = $req->rowCount();

                                    ?>
                                    <thead>
                                    <tr>
                                        <th>ID secteur</th>
                                        <th>Nom secteur</th>
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
                                        <th width="2%"> <?=$data['id']?> </th>
                                        <th> <?=$data['NomSecteur']?> </th>
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



</html>
<?php } else {
    header('Location: login.php?success=2');
}?>