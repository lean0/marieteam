<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require("global.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Marie Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Expedition Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Teko" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //online-fonts -->
</head>
<body>
<!-- banner -->
<div class="banner" id="home">
    <!-- header -->
    <?php

    if (isset($_GET['logerr']) && $_GET['logerr'] = 1) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">";
        echo "<strong>Erreur :</strong> Le mot de passe est incorrecte et/ou le compte lié au mail n'existe pas.";
        echo "</div>";
    }
    if (isset($_GET['regerr']) && $_GET['regerr'] = 1) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">";
        echo "<strong>Erreur :</strong> Les mots de passes ne correspondent pas.";
        echo "</div>";
    }

    require("tpl/header.php");
    ?>
    <!-- //header -->
    <div class="container-form">

        <!-- banner-text -->
        <form id="trip_form" method="post" action="search.php">

            <div class="entity">
                <span class="libelle">Port de départ</span>
                <br>
                <select id="inputState" name="inputAller" onchange="document.getElementById('selectedStart').value=this.options[this.selectedIndex].text">
                    <option value="">-- Départ --</option>
                    <?php
                    $req = $db->connection()->prepare('SELECT * FROM iledeservie');
                    $req->execute();
                    $rows = $req->rowCount();
                    for ($i = 1; $i <= $rows; $i++) {
                        $data = $req->fetch();
                        ?>
                        <option value="<?= $data['idIle'] ?>"><?= utf8_encode($data['nom']) ?></option>
                        <?php
                    }
                    ?>
                    <input type="hidden" name="selectedStart" id="selectedStart" value="" />
                </select>
            </div>

            <div class="entity">
                <span class="libelle">Port d'arrivée</span>
                <br>
                <select id="inputState" name="inputRetour" onchange="document.getElementById('selectedEnd').value=this.options[this.selectedIndex].text">
                    <option value="">-- Arrivée --</option>
                    <?php
                    $req = $db->connection()->prepare('SELECT * FROM iledeservie');
                    $req->execute();
                    $rows = $req->rowCount();
                    for ($i = 1; $i <= $rows; $i++) {
                        $data = $req->fetch();
                        ?>
                        <option value="<?= $data['idIle'] ?>"><?= utf8_encode($data['nom']) ?></option>
                        <?php
                    }
                    ?>
                    <input type="hidden" name="selectedEnd" id="selectedEnd" value="" />
                </select>
            </div>

            <div class="entity">
                <span class="libelle">Date</span><br>
                <input type="date" id="date_to" class="date_to" name="dateDepart" placeholder="Départ"/>
            </div>
            <div  class="entity" id="entity-submit">
                <input type="submit" id="submit" class="submit" value="Reservez" style="padding: 7.5px 12.5px; border: none; border-radius: 3.5px; background: #17a2b8; color: white "/>
            </div>

        </form>
    </div>
    <!-- //container -->
</div>
<!-- //banner -->
<div class="agileits-services py-md-5 py-4" id="services">
    <div class="container py-lg-5 center">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title"><span class="hdng">Nos </span>Services</h3>
            <span class="btmspn">
					<i class="fas fa-bus"></i>
				</span>
            <p class="mt-2 mx-auto"> Description des services</p>
        </div>
        <div class="d-flex justify-content-around text-center">
            <div class="col-lg-3 col-md-6">
                <div class="agileits-services-grids">
                    <i class="fas fa-ship"></i>
                    <h4>Voyager facile !
                    </h4>
                    <span></span>
                    <p>Utilisé notre réseaux maritime avec simplicité ! </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="agileits-services-grids">
                    <i class="fas fa-ship"></i>
                    <h4>Emporté votre véhicule !
                    </h4>
                    <span></span>
                    <p>Emporte votre véhicule avec vous même en voyangant sur notre réseau !</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- banner bottom -->
<div class="banner-bottom py-5">
    <div class="container py-xl-3 py-lg-3">
        <div class="row">
            <div class="col-md-9 banner-left-bottom-w3ls">
                <h3 class="text-white my-3"> Une société a votre écoute peu importe votre demande ! </h3>

            </div>
            <div class="col-md-3 button">
                <a href="about.php" class="w3ls-button-agile">Lire plus
                    <i class="fas fa-hand-point-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- //banner bottom -->

<!-- blog -->
<!--  <section class="blog_w3ls py-lg-5">
      <div class="container">
       <div class="w3ls-titles text-center mb-5">
              <h3 class="title"><span class="hdng">Nos nouveaux </span>Trajet</h3>
              <span class="btmspn">
                  <i class="fas fa-bus"></i>
              </span>
              <p class="mt-2 mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eum inventore consectetur dolorum, voluptatum possimus temporibus vel ab, nesciunt quod!</p>
          </div>
          <div class="row py-5">

              <!-- //blog grid -->
<!-- blog grid
<div class="col-lg-4 col-md-6">
    <div class="card">

        <div class="card-body text-center">
            <img src="images/g2.jpg" alt="" class="img-fluid">
            <h5 class="blog-title card-title mt-3 mb-3">
                <a href="services.php">Destinations of 2018</a>
            </h5>
            <p> Vivamus magna justo,
                lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit.</p>
            <a href="services.php" class="service-btn">Read more</a>
        </div>
        <div class="card-footer blog_w3icon border-top pt-2 mt-3 d-flex justify-content-between">
            <small>
                <b>By <a href="#">admin</a></b>
            </small>
            <span><i class="fas fa-calendar-alt"></i>
               12/08/18 <i class="fas fa-comments"></i> <a href="#">02</a>
            </span>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 mt-md-0 mt-5">
    <div class="card">

        <div class="card-body text-center">
        <img src="images/g3.jpg" alt="" class="img-fluid">
        <h5 class="blog-title card-title mt-3 mb-3">
                <a href="services.php">72 Hours in Toronto</a>
            </h5>
            <p>Vivamus magna justo,
                lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit.</p>
            <a href="services.php" class="service-btn">Read more</a>
        </div>
        <div class="card-footer blog_w3icon border-top pt-2 mt-3 d-flex justify-content-between">
            <small>
                <b>By <a href="#">admin</a></b>
            </small>
           <span><i class="fas fa-calendar-alt"></i>
               16/08/18 <i class="fas fa-comments"></i> <a href="#">02</a>
            </span>
        </div>
    </div>
</div>
<!-- //blog grid
<!-- blog grid
<div class="col-lg-4 col-md-6 blog-3 mt-md-0 mt-5">
    <div class="card">

        <div class="card-body text-center">
            <img src="images/g6.jpg" alt="" class="img-fluid">
            <h5 class="blog-title card-title mt-3 mb-3">
                <a href="services.php">Visiting the UAE</a>
            </h5>
            <p> Vivamus magna justo,
                lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit.</p>
            <a href="services.php" class="service-btn">Read more</a>
        </div>
        <div class="card-footer blog_w3icon border-top pt-2 mt-3 d-flex justify-content-between">
            <small>
                <b>By <a href="#">admin</a></b>
            </small>
           <span><i class="fas fa-calendar-alt"></i>
               22/08/18 <i class="fas fa-comments"></i> <a href="#">02</a>
            </span>
        </div>
    </div>
</div>
<!-- //blog grid
</div>
</div>
</section>

-->
<!-- //blog -->
<!-- stats -->
<?php
$req = $db->connection()->prepare('SELECT idClient FROM client');
$req->execute();
$data = $req->rowCount();

$req2 = $db->connection()->prepare('SELECT nom FROM iledeservie');
$req2->execute();
$data2 = $req2->rowCount();

$req3 = $db->connection()->prepare('SELECT id FROM contact');
$req3->execute();
$data3 = $req3->rowCount();

$req4 = $db->connection()->prepare('SELECT idBateau FROM bateau');
$req4->execute();
$data4 = $req4->rowCount();
?>
<section class="stat_w3l py-5">
    <div class="container">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title text-white"><span class="hdng">Services </span>Fact</h3>
            <span class="btmspn">
					<i class="fas fa-bus"></i>
				</span>
        </div>
        <div class="row py-lg-5 stats-con">
            <div class="col-lg-3 col-md-6 stats_info counter_grid">
                <div class="stats_info1">
                    <i class="fas fa-users"></i>
                    <p class="counter"><?=$data?></p>
                    <h4>Clients Heureux</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid">
                <div class="stats_info1">
                    <i class="fas fa-fighter-jet"></i>
                    <p class="counter"><?=$data2?></p>
                    <h4>Destinations  </h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid1">
                <div class="stats_info1">
                    <i class="fas fa-ship"></i>
                    <p class="counter"><?=$data4?></p>
                    <h4>Bateau</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid2">
                <div class="stats_info1">
                    <i class="fas fa-comments"></i>
                    <p class="counter"><?=$data3 ?></p>
                    <h4>Questions Repondus</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //stats -->

<!-- branches -->
<span class="btmspn">
	<section class="branches py-md-5 pt-4">

</section>
<!-- //branches -->
<!--footer -->
<?php
require("tpl/footer.php");
//footer

require ('session/login.php');
require ( 'session/register.php');
?>
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>

<!-- contact validation js -->
<script src="js/form-validation.js"></script>

<!-- Responsiveslides -->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: false,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Responsiveslides -->
<!-- stats -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();

</script>
<!-- //stats -->

<!-- start-smooth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="js/SmoothScroll.min.js"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>
</body>
</html>