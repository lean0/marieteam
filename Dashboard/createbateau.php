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
        <script type="text/javascript">
            $(document).ready(function(){

                demo.initChartist();

                $.notify({
            	icon: 'pe-7s-anchor',
            	message: "Success <b>Ajout Bateau</b>"

            },{
                    type: 'info',
                timer: 4000
            });

    	});
	</script>
<?php
    }
    else {


        header('Location: table.php');
        $_SESSION['success'] = 0;

    }

