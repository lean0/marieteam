        <header>
            <div class="top-head py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 callnumber text-left">
                        </div>
                        <div class="col-md-6 callnumber text-right">
                            <li class="mr-3">Numéro : +33622457859</li>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
                <h1>
                    <a class="navbar-brand" href="index.php">
                        MarieTeam
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">
                        <li class="nav-item mr-lg-3">
                            <a class="nav-link" href="index.php">Accueil
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item  mr-lg-3">
                            <a class="nav-link" href="about.php">À propos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contactez-nous</a>
                        </li>
                        <?php

                            if (isset($_SESSION['login']))
                            {
                                ?>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user"></i>
                                            <?php
                                                if (isset($_SESSION['login'])) {
                                                    echo $_SESSION['nom'];
                                                }
                                            ?>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Historique</a>
                                            <a class="dropdown-item" href="compte.php?key=<?=$_SESSION['idClient'];?>">Mon compte</a>
                                            <a class="dropdown-item" href="session/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                                        </div>
                                    </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <li>
                                        <button type="button" class="btn serv_bottom ml-lg-5 w3ls-btn text-white" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                                            Connexion
                                        </button>
                                    </li>
                                <?php

                            }
                        ?>

                    </ul>
                </div>
            </nav>
        </header>



