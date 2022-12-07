<?php
    include "./php/bdd.php";    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora&display=swap" rel="stylesheet">
    <!-- Lien icon dans l'onglet -->
    <link rel="icon" href="../sezhair/img/logo.jpg">
    <!-- Lien pour la police google font -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet"> <!-- RUBIK -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400&display=swap" rel="stylesheet"><!-- Comfortaa -->
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet"> <!-- Allerta -->
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;700&display=swap" rel="stylesheet"> <!-- Abhaya -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> <!-- Montserrat -->
    <!-- Lien pour fontawesome -->
    <link rel="stylesheet" href="assets/fontawesome6.1.2/css/all.css">
    <!-- Lien pour les icons de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Lien css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Sezhair</title>
</head>
<body>
    <!-- ...........................................  NAVBAR .................................................. -->
    <nav class="navbar navbar-expand-lg col-12">
        <div class="container-fluid">
            <a class="navbar-brand fs-1" href="index.php?page=1"><span class="sezhair"><span class="s">S</span>EZHAIR <span class="c">C</span>OIFFURE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link" aria-current="page" href="index.php?page=1"> Accueil</a>
                    </li>
                    <li class="nav-item  me-3">
                        <a class="nav-link" href="index.php?page=2">Prestations</a>
                    </li>
                    <li class="nav-item produits dropdown me-3">
                        <!-- Deroulant -->
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos produits</a>
                        <ul class="dropdown-menu">
                            <?php
                            $querySCP = "SELECT * FROM souscat_produits"; // <- categorie 
                            $reqSCP = $bdd->prepare($querySCP);
                            $reqSCP->execute();
                            // la boucle
                            while($data = $reqSCP -> fetch()){
                                echo '<li><a class="dropdown-item" href="index.php?page=3&souscat_produits='.$data["id"].'">'.$data["nom"].'</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item medias me-3">
                        <a class="nav-link" href="index.php?page=4">Médias</a>
                    </li>
                    <li class="nav-item  me-3">
                        <a class="nav-link" href="index.php?page=5">Contact</a>
                    </li>
                    <li class="nav-item fb">
                        <a class="nav-link" href="https://www.facebook.com/Sezhair/"><i class="fa-brands fa-xl fa-facebook"></i></a>
                    </li>
                    <li class="nav-item inst me-3">
                        <a class="nav-link" href="https://instagram.com/sezhair?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-xl fa-square-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['pseudo']))
                            {
                        ?> 
                            <li class="nav-item me-3">
                                <a class="nav-link" href="index.php?page=8">Déconnexion</a>
                            </li>
                            <?php
                            }
                            else{?><a class="nav-link" href="index.php?page=6"><button type="button" class="btn btn-dark btn-sm">Connexion</button></a>
                        <?php
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin de la navbar -->
    <!-- ...........................................  INCLUDE .................................................. -->
    <div class="main">
        <?php
            if (isset($_GET['page'])){
                $page=$_GET['page'];
                if($page==1){
                    include('php/accueil.php');
                }
                elseif($page==2){
                    include('php/prestation.php');
                }
                elseif($page==3){
                    include('php/produits.php');
                }
                elseif($page==4){
                    include('php/medias.php');
                }
                elseif($page==5){
                    include('php/contact.php');
                }
                elseif($page==6){
                    include('php/connexion.php');
                }
                elseif($page==7){
                    include('php/inscription.php');
                }
                elseif($page==8){
                    include('php/traitement-deco.php');
                }
            }
            else{
                ?>
                <script>window.location.replace("index.php?page=1");</script>
                <?php
            }
        ?>
    </div>
    <!-- ...........................................  INCLUDE .................................................. -->
    <!-- Footer contact -->
    <div class="box-footer-contacter">
        <div class="box-suivre">
            <div class="box-titre-suivre"><span class="titre-suivre">NOUS SUIVRE</span></div>
            <div class="box-texte-suivre"><span class="texte-suivre">Rejoignez-nous sur les réseaux sociaux</span></div>
            <div class="box-logo-suivre">
                <div class="logo-suivre1"><a href="https://www.facebook.com/Sezhair/"><i class="fa-brands fa-facebook-f fa-2xl"></i></a></div>
                <div class="logo-suivre2"><a href="https://instagram.com/sezhair?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i></a></div>
            </div>
        </div>
        <div class="box-contacter">
            <div class="box-titre-contacter"><span class="titre-suivre">NOUS CONTACTER</span></div>
            <div class="box-adresse-contacter"><span class="texte-suivre">28 rue Maréchal Foch<br>
                57440 ALGRANGE<br>
                09 54 42 38 11<br><br>
                OUVERT DU:<br>
                Mardi - Samedi: 09:00 - 19:00</span>
            </div>
        </div>
    </div>
    <!-- Footer copyright -->
    <footer class="text-center text-lg-start">
        <div class="text-center text-foot p-3" style="background-color: black;">
            Copyright © 2022.SEZHAIR. Tous droits réservés
        </div>
    </footer>
    <!-- ...........................................  SCRIPT .................................................. -->
    <script src="assets/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>