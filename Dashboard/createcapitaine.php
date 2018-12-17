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
        ?>
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Success! </strong>
                Ajout Capitaine
            </div>
            <script>
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
            </script>
        <?php
    }
 ?>