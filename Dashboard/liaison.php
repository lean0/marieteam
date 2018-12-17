<!doctype html>
<html lang="en">
<?php
require("tpl/header.php");
require("tpl/navbar.php");
require("../global.php");
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
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Capitaine</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret hidden-sm hidden-xs"></b>
                            <span class="notification hidden-sm hidden-xs">5</span>
                            <p class="hidden-lg hidden-md">
                                5 Notifications
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Notification 3</a></li>
                            <li><a href="#">Notification 4</a></li>
                            <li><a href="#">Another notification</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Search</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">
                            <p>Account</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Dropdown
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
$req = $db->connection()->prepare('SELECT nom FROM iledeservie');
$req->execute();
$rw = $req->rowCount();
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <form action="createliaison.php" method="post">

                            <label for="port depart" class="col-form-label">Port de départ</label>
                            <select class="form-control" id="selectPortDepart" name="selectPortDepart" value="<?=@$_POST['selectPortDepart'] ?>">
                            <?php if($rw != 0) {
                        for ($j = 1; $j <= $rw; $j++) {
                        $dt = $req->fetch();
                        echo $dt;
                        ?>
                            <option><?=$dt['nom']?></option>
                        <?php } } ?>

                            </select>
                        </div>

                    <?php
                    $req2 = $db->connection()->prepare('SELECT nom FROM iledeservie');
                    $req2->execute();
                    $rw2 = $req2->rowCount();
                    ?>
                    <div class="form-group">
                            <label for="port depart" class="col-form-label">Port de départ</label>
                            <select class="form-control" id="selectPortArriver" name="selectPortArriver" value="<?=@$_POST['selectPortArriver'] ?>">
                                <?php if($rw2 != 0) {
                                    for ($h = 1; $h <= $rw2; $h++) {
                                        $dt2 = $req2->fetch();
                                        ?>
                                        <option><?=$dt2['nom']?></option>
                                    <?php } } ?>

                            </select>
                    </div>

                            <div class="form-group">
                                <label for="distance" class="col-form-label">Distance KM</label>
                                <input type="number" value="<?=@$_POST['distance'] ?>"  class="form-control" placeholder=" " name="distance" id="distance" required="">
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

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
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
</div>







<?php
require("tpl/footer.php");
?>

</div>
</div>


</body>



</html>
