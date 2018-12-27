<?php
require("../global.php");
if (isset($_SESSION['login'])){
?>
<!doctype html>
<html lang="en">
<?php
require("tpl/header.php");
require("tpl/navbar.php");
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

                                $req = $db->connection()->prepare('SELECT * FROM client');
                                $req->execute();
                                $rows = $req->rowCount();

                                ?>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Mail</th>
                                            <th>Date d'inscription</th>
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
                                        <th> <?=$data['idClient']?>  </th>
                                        <th> <?=$data['nom']?> </th>
                                        <th> <?=$data['prenom'] ?></th>
                                        <th> <?=$data['mail'] ?></th>
                                        <th> <?=date('m/d/Y', $data['dateInscription']) ?></th>
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
<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
        </p>
    </div>
</footer>

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
<?php } else {
    header('Location: login.php?success=2');
} ?>