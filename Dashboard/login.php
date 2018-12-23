<html>
<!doctype html>
<html lang="en">
<head>
    <?php require('tpl/header.php');
    require("../global.php");

    if (isset($_GET['success'])) {
        if ($_GET['success'] == 1) {
            echo '<body onload="demo.showErrorid(\'top\',\'right\')">';
        }
        elseif ($_GET['success'] == 0){
            echo '<body onload="demo.showErrorPassword(\'top\',\'right\')">';
        }
    }

    ?>
    <style>
        body {
            background-image: url("assets/img/azuregrotte.jpg");
        }
    </style>
</head>
<body>

<form action="log.php" method="post">
    <div>
        <label for="idAdmin">Login</label>
        <input type="text" value="<?=@$_POST['idAdmin'] ?>" placeholder=" " name="idAdmin" id="idAdmin" required>
    </div>

    <div>
        <label for="password">mot de passe</label>
        <input type="password" value="<?=@$_POST['password'] ?>" name="password" id="password" required>
    </div>

        <input type="submit" value="Validez">
</form>
<style>
    body{
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-around;
    }
    form{
        margin: auto;
        width: 280px;
        padding: 15px;
        background: rgb(255,255,255,0.75);
        border-radius: 3.5px;
    }
    div {
        margin: 7.5px auto;
    }
        label{
            width: 100%;
            text-align: left;
        }

        input
        {
            width: 100%;
            padding: 7.5px 5px;
            border: none;
            border-radius: 3px;
        }
            input[type="submit"]
            {
                background: #42c8f4;
                margin: 12.5px auto;
                transition: all 1s;
            }
                input[type="submit"]:hover
                {
                    background: #1c7430;
                    color: white;
                }

</style>


</body>
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
</html>
