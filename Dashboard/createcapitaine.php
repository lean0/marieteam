<?php
require("../global.php");
/**
 * Created by PhpStorm.
 * User: sio
 * Date: 10/12/2018
 * Time: 09:56
 */



    if(isset($_POST['nomCapitaine']) && isset($_POST['prenomCapitaine']) && isset($_POST['emailCapitaine']) && isset($_POST['telephoneCapitaine'])) {
        $nomcapitaine = $_POST['nomCapitaine'];
        $prenomCapitaine = $_POST['prenomCapitaine'];
        $emailCapitaine = $_POST['emailCapitaine'];
        $telephoneCapitaine = $_POST['telephoneCapitaine'];
        $datetoday = time();

        $req = $db->connection()->prepare('INSERT INTO capitaine (nomCapitaine, prenomCapitaine, dateDebut, emailCapitaine, telephoneCapitaine) VALUE (?,?,?,?,?)');
        $req->execute([$nomcapitaine, $prenomCapitaine, $datetoday, $emailCapitaine, $telephoneCapitaine]);
        $success = 1;
        ?>

        <script type="text/javascript">
            $(document).ready(function(){

                demo.initChartist();

                $.notify({
                    icon: 'pe-7s-anchor',
                    message: "Success <b>Ajout MarieTeam</b>"

                },{
                    type: 'info',
                    timer: 4000
                });

            });
        </script>
        <?php

    }

    ?>