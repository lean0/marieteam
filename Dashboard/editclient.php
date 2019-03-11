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
        <?php require('tpl/navbartop.php');
        $req = $db->connection()->prepare ('SELECT * FROM client WHERE idClient = ' . $_GET['id']);
        $req->execute();
        $rows = $req->rowCount();
    if ($rows != 0) {
        for ($i = 1; $i <= $rows; $i++) {
            $data = $req->fetch();
            ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form action="editusersql.php" method="post">

                                    <input type='hidden' name="idUser" class='form-control' value="<?= $data['idClient']?>">

                                    <div class="form-group">
                                        <label for="nomUser" class="col-form-label">Nom</label>
                                        <input type="text" value="<?= $data['nom'] ?>" class="form-control" placeholder=" "
                                               name="nomUser" id="nomUser" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenomUser" class="col-form-label">Prénom</label>
                                        <input type="text" value="<?= $data['prenom'] ?>" class="form-control"
                                               placeholder=" " name="prenomUser" id="prenomUser" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="mailUser" class="col-form-label">Mail</label>
                                        <input type="text" value="<?= $data['mail'] ?>" class="form-control"
                                               placeholder=" " name="mailUser" id="mailUser" required>
                                    </div>

                                    <input type="checkbox" id="pwchange" name="pwchange" checked>
                                    <label for="pwchange">Lock password</label>
                                    <input disabled="disabled" id="pw-input" type='text' name="password" class='form-control' placeholder="Nouveau mot de passe" value="">

                                    <br>
                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" id="edit-btn" value="Modifier">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
        ?>
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


    </body>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="assets/js/demo.js"></script>


<!--Script pour le lock password-->
    <script>
        $('input[type=checkbox]').change(function () {
            if ($('input[type=checkbox]').prop('checked')) {
                $('#pw-input').attr('disabled', true).attr('required', false).val('');
                return true;
            }

            $('#pw-input').attr('disabled', false).attr('required', true);
        })
    </script>
    <!--Script ajax pour la modif + modals-->-->
<!--    <script>-->
<!--        $("#form_edit_user").submit(function () {-->
<!--            let id = $('input[name="user_id"]').val();-->
<!--            $.ajax({-->
<!--                type: "POST",-->
<!--                url: "editusersql.php?id="+id,-->
<!--                data: $('#form_edit_user').serialize(),-->
<!--                success:function(error) {-->
<!--                    if (error === "error") {-->
<!--                        console.log("erreur");-->
<!--                    }-->
<!--                    else {-->
<!--                        console.log("ok");-->
<!--                    }-->
<!--                },-->
<!--                error:function(){-->
<!--                    console.log("erreur");-->
<!--                }-->
<!--            });-->
<!--            return false;-->
<!--        })-->
<!--    </script>-->




    </html>
<?php } else {
    header('Location: login.php?success=2');
} ?>