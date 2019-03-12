<?php
require("../global.php");
if (isset($_SESSION['login'])){
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
                    </br>
                    <h4 class="title">TODO List</h4>

                            <table class="table table-striped table-bordered" id="test" style="width:100%">
                                <script>
                                    $(document).ready(function() {
                                        $('#test').DataTable();
                                    } );
                                </script>
                                <div class="Tableau">

                                <thead>
                                <tr>
                                    <th>Tâches</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Bilel</th>
                                </tr>
                                        <tr>
                                            <th>Réorganiser la hiérarchie des fichiers (Mettre les createxxx.php dans un dossier appart, de même xxxdel.php, etc)</th>
                                        </tr>
                                        <tr>
                                            <th>Faire en sorte que Bilel boss</th>
                                        </tr>
                                    <tr>
                                        <th>Léandre</th>
                                    </tr>
                                        <tr>
                                            <th>S'occuper du contenue du site web principale en récupérant des infos depuis la bdd en affichage</th>
                                        </tr>
                                     <tr>
                                         <th>Redha</th>
                                    </tr>
                                    <tr>
                                        <th>Système de tarification</th>
                                    </tr>
                                    <tr>
                                        <th>Clément</th>
                                    </tr>
                                    <tr>
                                        <th> Système de recherche des itinéraire sur le site principale depuis la bdd </th>
                                    </tr>
                                </div>
                                </tbody>
                            </table>
                    </div>

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
<?php } else {
    header('Location: login.php?success=2');
}?>
