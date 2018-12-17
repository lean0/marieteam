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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
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



</html>
