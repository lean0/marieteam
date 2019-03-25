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
    <title>Expedition A Travel Category Bootstrap Responsive website Template | Services :: w3layouts</title>
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
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //online-fonts -->
</head>
<body>
    <!-- banner -->
    <div class="inner-banner">
        <!-- header -->

        <?php
        require("tpl/header.php");

        ?>

        <!-- //header -->
    </div>
    <!-- //banner -->
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>


		<!-- promotions -->
	<section class="wthree-row w3-about  py-5">
		<div class="container py-md-4 mt-md-3">
			  <div class="w3ls-titles text-center mb-5">
				<h3 class="title"><span class="hdng">Our </span>Services</h3>
				<span class="btmspn">
					<i class="fas fa-ship"></i>
				</span>
				<p class="mt-2 mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eum inventore consectetur dolorum, voluptatum possimus temporibus vel ab, nesciunt quod!</p>
			</div>


			<div class="card-deck mt-md-5 pt-4">
				  <div class="card">
					<img src="images/g1.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">Germany</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>Netherlands / Belgium</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$380</a>
					</div>
				  </div>
				  <div class="card">
					<img src="images/g2.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">France</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>France / Paris</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$450</a>
					</div>
				  </div>
				  <div class="card">
					<img src="images/g3.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">Australia</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>Melbourne / Sydney</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$500</a>
					</div>
				  </div>
				</div>
				<div class="card-deck mt-md-5 pt-3">
				  <div class="card">
					<img src="images/g4.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">Italy</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>Rome / Naples</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$640</a>
					</div>
				  </div>
				  <div class="card">
					<img src="images/g5.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">Saudi Arabia</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>Iraq / Iran</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$450</a>
					</div>
				  </div>
				  <div class="card">
					<img src="images/g6.jpg" class="img-fluid" alt="Card image cap">
					<div class="card-body w3ls-card">
					  <h5 class="card-title">South Africa</h5>
					  <p class="card-text mb-3"><i class="fas fa-map-marker pr-2"></i>Namibia / Durban</p>
					  <p class="card-text mb-3"><i class="far fa-clock pr-2"></i>3 days - 2 nights</p>
						<a href="#" class="btn btn-primary">$580</a>
					</div>
				  </div>
				</div>
            </div>
        </section>
<!-- //promotions -->

   <!--footer -->
    <?php
    require("tpl/footer.php");
    //footer

    require ('session/login.php');
    require ( 'session/register.php');
    ?>
    <!-- contact validation js -->
    <script src="js/form-validation.js"></script>
   
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