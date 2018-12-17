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

<form>
    <div>
        <label for="idAdmin">Login</label>
        <input type="text" value="<?=@$_POST['idAdmin'] ?>" placeholder=" " name="idAdmin" id="idAdmin" required>
    </div>

    <div>
        <label for="uniquePassword">mot de passe</label>
        <input type="password" value="<?=@$_POST['uniquePassword'] ?>" name="uniquePassword" id="uniquePassword" required>
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
            padding: 7.5px 0px;
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
</html>
