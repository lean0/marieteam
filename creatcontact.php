<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require("global.php");
?>
<html lang="fr">
<head>
    <title>Voyage</title>
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
    <?php


    if(isset($_POST['Nom']) && isset($_POST['Email']) && isset($_POST['Objet']) && isset($_POST['Message'])) {
        $Nom = $_POST['Nom'];
        $Email = $_POST['Email'];
        $Objet = $_POST['Objet'];
        $Message = $_POST['Message'];


        $req = $db->connection()->prepare('INSERT INTO contact (Nom, Objet, Message, Email) VALUE (?,?,?,?)');
        $req->execute([$Nom, $Objet, $Message, $Email]);
    }

    ?>
    <!-- //header -->
</div>

<!-- about -->
    <section class="welcome">
    <div class="container py-md-4 mt-md-1">
        <div class="alert alert-success" role="alert" style="text-align: center">
            <h4 class="alert-heading">Succès !</h4>
            <p>Votre demande de contacte a bien était envoyer !</p>
            <p class="mb-0">N'hésitez pas l'équipe MarieTeam vous souhaite une agrèable journée.</p>
        </div></div>
</section>

<!-- //about -->
<!-- banner bottom -->

<!-- //banner bottom -->



<!-- //about-team -->

<!--footer -->
<footer>
    <?php
    require("tpl/footer.php");
    require ('session/login.php');
    require ('session/register.php');
    ?>
    <!-- //footer -->
</footer>
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- script for password match -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- script for password match -->
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