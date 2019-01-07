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
                        <form action="createadmin.php" method="post">
                            <div class="form-group">
                                <label for="nomAdmin" class="col-form-label">nom du salarié</label>
                                <input type="text" value="<?=@$_POST['nomAdmin'] ?>"  class="form-control" placeholder=" " name="nomAdmin" id="nomAdmin" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">mot de passe</label>
                                <input type="password" value="<?=@$_POST['password'] ?>"  class="form-control" placeholder=" " name="password" id="password" required="">
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
                                    $req = $db->connection()->prepare('SELECT * FROM admin');
                                    $req->execute();
                                    $rows = $req->rowCount();

                                    ?>
                                    <thead>
                                    <tr>
                                        <th>ID compte</th>
                                        <th>Nom salarié</th>
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
                                                <th> <?=$data['idAdmin']?>  </th>
                                                <th> <?=$data['nomAdmin']?> </th>
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