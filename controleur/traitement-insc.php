<?php
require "../modele/bdd.php";
require "../modele/fonction.php";

if ((isset($_POST['nom']) 
    && isset($_POST['prenom'])
    && isset($_POST['pseudo']) 
    && isset($_POST['mdp'])
    && isset($_POST['email']) 
    && isset($_POST['numero'])) 
    && ($_POST['nom'] !=null 
    && $_POST['prenom'] !=null
    && $_POST['pseudo'] !=null
    && $_POST['mdp'] !=null
    && $_POST['email'] !=null 
    && $_POST['numero'] !=null)){

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $hash = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $email = htmlspecialchars($_POST['email']);
    $numero = htmlspecialchars($_POST['numero']);

    $inscription = insertInscription($bdd, $nom, $prenom, $pseudo, $hash, $email, $numero);

    $_SESSION['message']= '<div id="message" class="alert alert-success text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-check me-3"></i>Votre compte a bien été créé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    header('location:../public/index.php?page=6');
}
?>