<!doctype html>
<html lang="en">
<?php
require("../global.php");
if (isset($_SESSION['login'])){
require("tpl/header.php");
require("tpl/navbar.php");

?>
<body>



    <div class="main-panel">
        <?php require ('tpl/navbartop.php');?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">je sais pas quoi écrire</h4>
                                <p class="category">poser dans le bendo <a target="_blank" href="http://themes-pixeden.com/font-demos/7-stroke/index.html">pouloulou</a></p>
                            </div>
                            <div class="content all-icons">
                                <div class="row">


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
    require("tpl/footer.php");
    ?>


    </div>
</div>


</body>

    


</html>
<?php } ?>