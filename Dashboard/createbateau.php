<?php

require("../global.php");

    if(isset($_POST['nom']) && isset($_POST['typeBateau']) && isset($_POST['capaciteBateau'])) {
        echo $_POST['nom'];
        $nom = $_POST['nom'];
        $type = $_POST['typeBateau'];
        $capa = $_POST['capaciteBateau'];

        $req = $db->connection()->prepare('INSERT INTO bateau (nom, typeBateau, capaciteBateau) VALUE (?,?,?)');
        $req->execute([$nom, $type, $capa]);
        $success=1;

        header('Location: table.php');
        ?>
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Success! </strong>
                Ajout Bateau
            </div>
            <script>
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
            </script>
        <?php

    }
    else {


        header('Location: table.php');
        $_SESSION['success'] = 0;

    }

