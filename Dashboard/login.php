<html>
<!doctype html>
<html lang="en">
<head>
    <?php require('tpl/header.php');
    ?>
    <style>
        body {
            background-image: url("assets/img/azuregrotte.jpg");
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-2 col-md-offset-5">
        <div class="form-group">
            <label for="idAdmin" class="col-form-label">Login</label>
            <input type="text" value="<?=@$_POST['idAdmin'] ?>" class="form-control" placeholder=" " name="idAdmin" id="idAdmin" required="">
        </div>
        <div class="form-group">
            <label for="uniquePassword" class="col-form-label">mot de passe</label>
            <input type="text" value="<?=@$_POST['uniquePassword'] ?>" class="form-control" placeholder=" " name="uniquePassword" id="uniquePassword" required="">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control serv_bottom" value="Validez">
        </div>
    </div>
</div>

</body>
</html>
