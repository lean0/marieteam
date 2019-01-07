<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
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
                                    <li><a href="notif.php"><?= $dataN['Libelle'] ?></a></li>
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
                <li>
                    <a href="">
                        <i class="fa fa-search"></i>
                        <p class="hidden-lg hidden-md">Search</p>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">




                <li>




                    <a href="">
                        <p><?=$_SESSION['login']?></p>
                    </a>
                </li>





                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>
                            Dropdown
                            <b class="caret"></b>
                        </p>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
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