<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Expedition A Travel Category Bootstrap Responsive website Template | Home :: w3layouts</title>
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
    require("tpl/header.php");
    ?>
    <!-- //header -->
    <div class="container-form">

        <!-- banner-text -->
        <form id="trip_form">

            <div class="entity">
                <span class="libelle">aller</span>
                <br>
                <input type="text" id="date_from" class="place" placeholder="EG. HAWAII">
            </div>

            <div class="entity">
                <span class="libelle">arrivé</span><br>
                <input type="text" id="date_from" class="place" placeholder="EG. MIAMI">
            </div>

            <div class="entity">
                    <span class="libelle">Départ</span><br>
                    <input type="date" id="date_to" class="date_to" placeholder="Départ"/>
                    <!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
            </div>
            <div class="entity">
                <span class="libelle">Type</span><br>
                    <select id="inputState" class="form-control">
                        <option selected>Personne</option>
                        <option>Produit</option>
                    </select>
            </div>

            <div  class="entity" id="entity-submit">
                <input type="submit" id="submit" class="submit" value="Book now" style="padding: 7.5px 12.5px; border: none; border-radius: 3.5px; background: #17a2b8; color: white "/>
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
        <div class="agileits-services-row row py-lg-5 pb-5 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="agileits-services-grids">
                    <i class="fas fa-ship"></i>
                    <h4>Ship
                    </h4>
                    <span></span>
                    <p> Rejoignez nous pour la découverte du monde bleu </p>
                    <a href="about.php" class="service-btn">Lire plus</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="agileits-services-grids">
                    <i class="fas fa-ship"></i>
                    <h4>Tool transport
                    </h4>
                    <span></span>
                    <p> Nous envoyons vos colis comme jamais</p>
                    <a href="about.php" class="service-btn">Lire plus</a>
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
                <h3 class="text-white my-3"> Le moyen le plus rapide de comparer vos plus 450 trajets </h3>

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
<!-- //blog grid
<!-- blog grid
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
<section class="stat_w3l py-5">
    <div class="container">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title text-white"><span class="hdng">Services </span>Fact</h3>
            <span class="btmspn">
					<i class="fas fa-bus"></i>
				</span>
            <p class="mt-2 mx-auto text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eum inventore consectetur dolorum, voluptatum possimus temporibus vel ab, nesciunt quod!</p>
        </div>
        <div class="row py-lg-5 stats-con">
            <div class="col-lg-3 col-md-6 stats_info counter_grid">
                <div class="stats_info1">
                    <i class="fas fa-users"></i>
                    <p class="counter">25,000</p>
                    <h4>Clients Heureux</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid">
                <div class="stats_info1">
                    <i class="fas fa-fighter-jet"></i>
                    <p class="counter">120</p>
                    <h4>Destinations Canon </h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid1">
                <div class="stats_info1">
                    <i class="fas fa-briefcase"></i>
                    <p class="counter">300</p>
                    <h4>Partenaires</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 stats_info counter_grid2">
                <div class="stats_info1">
                    <i class="fas fa-comments"></i>
                    <p class="counter">6,812</p>
                    <h4>Questions Repondus</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //stats -->

<!-- branches -->
<section class="branches py-md-5 pt-4">
    <div class="container">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title"><span class="hdng">Nouvelles </span>destinations</h3>
            <span class="btmspn">
					<i class="fas fa-bus"></i>
				</span>
            <p class="mt-2 mx-auto">
                Depuis Octobre, nous avons acqueri la possiiblité de desservir sur ses nouvelles destinations!
            </p>
        </div>

        <div class="row py-5 branches-position">
            <div class="col-lg-3 col-md-6">
                <!-- team-img -->
                <div class="team-block">
                    <div class="team-img">
                        <img src="images/h1.jpg" alt="" class="img-fluid">
                        <div class="team-content">
                            <h4 class="text-white">Turkey</h4>
                            <p class="team-meta"> 8 days…</p>
                        </div>
                        <div class="overlay">
                            <div class="text">
                                <p class="team-meta">-Istanbul,  </p>
                                <p class="team-meta">- Antalya,</p>
                                <p class="team-meta">
                                    -Ephesus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.team-img -->
            <div class="col-lg-3 col-md-6">
                <!-- team-img -->
                <div class="team-block">
                    <div class="team-img">
                        <img src="images/h2.jpg" alt="" class="img-fluid">
                        <div class="team-content">
                            <h4 class="text-white">United Kingdom</h4>
                            <p class="team-meta">13 days…</p>
                        </div>
                        <div class="overlay">
                            <div class="text">
                                <p class="team-meta">-England,   </p>
                                <p class="team-meta">- Scotland,</p>
                                <p class="team-meta">
                                    -Wales.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.team-img -->
            <div class="col-lg-3 col-md-6">
                <!-- team-img -->
                <div class="team-block">
                    <div class="team-img">
                        <img src="images/h3.jpg" alt="" class="img-fluid">
                        <div class="team-content">
                            <h4 class="text-white">Spain</h4>
                            <p class="team-meta">9 days…</p>
                        </div>
                        <div class="overlay">
                            <div class="text">
                                <p class="team-meta">-Madrid,   </p>
                                <p class="team-meta">- Andalucia,</p>
                                <p class="team-meta">
                                    -Barcelona.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.team-img -->
            <div class="col-lg-3 col-md-6">
                <!-- team-img -->
                <div class="team-block">
                    <div class="team-img">
                        <img src="images/h4.jpg" alt="" class="img-fluid">
                        <div class="team-content">
                            <h4 class="text-white">Europe</h4>
                            <p class="team-meta">10 days…</p>
                        </div>
                        <div class="overlay">
                            <div class="text tex-center">

                                <p class="team-meta">-Slovenia,  </p>
                                <p class="team-meta">- Hungary,</p>
                                <p class="team-meta">
                                    -Poland.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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