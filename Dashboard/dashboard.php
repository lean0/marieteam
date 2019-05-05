<!doctype html>
<html lang="en">
<?php
require("../global.php");
if (isset($_SESSION['loginAdmin'])){
    require("tpl/header.php");
    require("tpl/navbar.php");

    //$cat = ['a1','a2','a3'];
    //$a1 = 0;
    //$a2 = 0;
    //$a3 = 0;
    //for each $uneCat
        //$req = 'SELECT COUNT* FROM reservation WHERE type = $uneCat';
        //$nm de la cat = count;
    //$tot =
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<body>
    <div class="main-panel">
    <?php require ('tpl/navbartop.php');
    $req = $db->connection()->prepare("SELECT * FROM reservation WHERE libelleTarification = 'Ticket Enfant'");
    $req->execute();
    $rw = $req->rowCount();

    $req2 = $db->connection()->prepare("SELECT * FROM reservation WHERE libelleTarification = 'Ticket adulte'");
    $req2->execute();
    $rw2 = $req2->rowCount();

    $req3 = $db->connection()->prepare("SELECT * FROM reservation WHERE libelleTarification = 'Ticket Junior'");
    $req3->execute();
    $rw3 = $req3->rowCount();
    $date = "depuis le début de l'utilisation du site marieteam";

    $rwtotal = $rw+$rw2+$rw3;

    if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])){
        ?>


        <div class="container">
            <div class="row">
                <form action="stat1.php" method="post">
                    <div class="form-group">
                        <label for="periode">Période 1 : </label>
                        <input type="date" id="periode" class="date_to" name="periode" placeholder="periode 1"/>
                    </div>
                    <div class="form-group">
                        <label for="periode2">Période 2 : </label>
                        <input type="date" id="periode2" class="date_to" name="periode2" placeholder="periode 2"/>
                    </div>
                    <div class="form-group">
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>

        <div class="content" style="display: flex; flex-wrap: wrap-reverse; flex-direction: row;">
            <div class="stat">
                <div style="text-align: center">
                    <b><?= $_GET['t'] ?></b> passagers  <b><?= 'du '.$_GET['d1'].' au '.$_GET['d2'] ?></b>
                </div>
                <canvas id="myChart" width="200" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Adulte', 'Jeune', 'Enfant'],
                            datasets: [{
                                label: '# transporter',
                                data: [<?=$_GET['a']?>, <?=$_GET['b']?>, <?=$_GET['c']?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.75)',
                                    'rgba(54, 162, 235, 0.75)',
                                    'rgba(255, 206, 86, 0.75)'
                                ],
                                borderColor: [
                                    'rgba(255, 255, 255, 1)',
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                </script>
            </div>

        <?php
    }else{
    ?>




        <div class="container">
<div class="row">
    <form action="stat1.php" method="post">
    <div class="form-group">
        <label for="periode">Période 1 : </label>
        <input type="date" id="periode" class="date_to" name="periode" placeholder="periode 1"/>
    </div>
    <div class="form-group">
        <label for="periode2">Période 2 : </label>
        <input type="date" id="periode2" class="date_to" name="periode2" placeholder="periode 2"/>
    </div>
    <div class="form-group">
        <input type="submit">
    </div>
    </form>
</div>
        </div>

        <div class="content" style="display: flex; flex-wrap: wrap-reverse; flex-direction: row;">
            <div class="stat">
                <div style="text-align: center">
                    <b><?= $rwtotal ?></b> passagers  <b><?= $date ?></b>
                </div>
                <canvas id="myChart" width="200" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Adulte', 'Jeune', 'Enfant'],
                            datasets: [{
                                label: '# transporter',
                                data: [<?=$rw2?>, <?=$rw3?>, <?=$rw?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.75)',
                                    'rgba(54, 162, 235, 0.75)',
                                    'rgba(255, 206, 86, 0.75)'
                                ],
                                borderColor: [
                                    'rgba(255, 255, 255, 1)',
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                </script>
            </div>
<?php } ?>

<style>
    .stat
    {
        width: 500px;
        height: auto;
    }
    .filtre
    {
        padding: 10px;
        border-radius: 2px;
        border: none;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        background: rgba(15, 7, 10, 0.15);
        color: #000;
        height: auto;
    }
    .filtre div input
    {
        width: 100%;
    }
    #myChart
    {
        max-width: 850px;
        max-height: 850px;
    }
    @media all and (max-width: 1500px){
        .stat
        {
            width: 100%;
        }
        .filtre
        {
            width: 100%;
        }
        .content
        {
            flex-direction: column;
        }
    }
</style>


    </div>
</body>
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-anchor',
            	message: "Bienvenue <b>Panel Administration de MarieTeam</b>"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
<?php } else {
    header('Location: login.php?success=2');
}?>