<!-- Traitement pour la connexion  -->
<?php
include "bdd.php";

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$query = "SELECT * FROM  connexion WHERE pseudo=:pseudo";
$req = $bdd->prepare($query);
$req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$req->execute();
$data = $req->fetch();
    if(!empty($data)){
            if(password_verify($mdp,$data['mdp'])){
                $_SESSION['pseudo']=$data['pseudo'];
                $_SESSION['message']= '<div id="message" class="alert alert-success text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-check me-3"></i>Bienvenue dans l\'administration<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                header('location:../index.php?page=1');
            }
            else{
                $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Mot de passe incorrect<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                header('location:../index.php?page=6');
            }
        }
    else{
        $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Utilisateur inconnu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../index.php?page=6');
    }
?>
