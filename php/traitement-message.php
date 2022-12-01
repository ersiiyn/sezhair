<!-- Traitement pour envoyer un message -->
<?php
include "bdd.php";
// var_dump($_POST);
if((isset($_POST['nom']) 
&& isset($_POST['email'])
&& isset($_POST['mot'])) 
&& ($_POST['nom'] !=null 
&& $_POST['email'] !=null
&& $_POST['mot'] !=null)){

$nom = htmlspecialchars($_POST['nom']);
$email = htmlspecialchars($_POST['email']);
$mot = htmlspecialchars($_POST['mot']);

$query = 'INSERT INTO contacter(nom, email, mot) VALUES (:nom, :email, :mot)';
$requete = $bdd->prepare($query);
$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':email', $email, PDO::PARAM_STR);
$requete->bindValue(':mot', $mot, PDO::PARAM_STR);
$requete->execute();
// Message de confirmation
if (isset($_POST['envoie_message'])){

    $_SESSION['message'] = '<div class="alert alert-success text-center" role="alert">Message envoyé</div>';
    header('location:../index.php?page=5');
    
}
}
?>