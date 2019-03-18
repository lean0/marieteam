<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Administration</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                        <b class="caret hidden-lg hidden-md"></b>
                        <p class="hidden-lg hidden-md">
                            5 Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $reqN = $db->connection()->prepare('SELECT * FROM notifications');
                        $reqN->execute();
                        $rowsN = $reqN->rowCount();
                        $notifCounter = 0;
                        if ($rowsN != 0) {
                            for ($i = 1; $i <= $rowsN; $i++) {
                                $dataN = $reqN->fetch();
                                $idNotif = $dataN['id'];
                                $notifCounter++;
                                if ($notifCounter <= 5) {
                                    ?>
                                    <li><a href="notif.php"><?=$dataN['Libelle']?> (<?=$dataN['nomQui']?>)</a></li>
                                    <?php
                                }
                            }
                        }
                        else {
                        ?>
                        <li><a href="notif.php">Pas de nouveautées..</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">




                <li>




                    <a href="">
                        <p><?=$_SESSION['login']?></p>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <p>Log out</p>
                    </a>
                </li>
                <li class="separator hidden-lg"></li>
            </ul>
        </div>
    </div>
</nav>