<!-- Traitement pour la connexion  -->
<?php
require "../modele/bdd.php";
require "../modele/fonction.php";

$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = $_POST['mdp'];

$dataCo = recupConnexion($bdd, $pseudo);
// var_dump($dataCo);
    if(!empty($dataCo)){
        if(password_verify($mdp,$dataCo['mdp'])){
            $_SESSION['pseudo']=$dataCo['pseudo'];
            $_SESSION['message']= '<div id="message" class="alert alert-success text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-check me-3"></i>Bienvenue dans l\'administration<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location:../public/index.php?page=1');
        }
        else{
            $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Mot de passe incorrect<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location:../public/index.php?page=6');
        }
    }
    else{
        $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Utilisateur inconnu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/index.php?page=6');
    }
?>
