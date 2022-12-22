<!-- Traitement pour envoyer un message -->
<?php
require "../modele/bdd.php";
require "../modele/fonction.php";

if((isset($_POST['nom']) 
    && isset($_POST['email'])
    && isset($_POST['mot'])) 
    && ($_POST['nom'] !=null 
    && $_POST['email'] !=null
    && $_POST['mot'] !=null)){

    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mot = htmlspecialchars($_POST['mot']);

    $envoiMessage = envoiMessage($bdd, $nom, $email, $mot);
    // Message de confirmation
    if(isset($_POST['envoie_message'])){
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert"> Message envoyé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/index.php?page=5');
    }
}
?>