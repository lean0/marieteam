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
        input {
            <!-- TODO -->
            color: #710000;
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
                            <h4 class="title">Notifications</h4>
                        </div>


                            <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                <script>
                                    $(document).ready(function() {
                                        $('#tabuser').DataTable();
                                    } );
                                </script>
                                <?php

                                $req = $db->connection()->prepare('SELECT * FROM notifications');
                                $req->execute();
                                $rows = $req->rowCount();

                                ?>
                                <thead>
                                <tr>

                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th><?="<a href='notifdel.php?id=*'>DEL ALL</a>" ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //print_r($data);
                                if ($rows != 0) {
                                    for ($i = 1; $i <= $rows; $i++) {
                                        $data = $req->fetch();
                                        $idtodl = $data['id'];
                                        ?>
                                        <tr>

                                            <th width="15%"><?=$data['nomQui']?></th>
                                            <th><?=$data['Libelle']?></th>
                                            <th width="10%">
                                                    <?="<a href='notifdel.php?id=" . $data["id"] . "'>Suppr</a>" ?>
                                            </th>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo "Pas de nouvelles notifications";
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