<?php
require "../modele/bdd.php";
// var_dump($_POST);
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

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = htmlspecialchars($_POST['pseudo']);
$hash = password_hash($_POST['mdp'],PASSWORD_BCRYPT);
$email = $_POST['email'];
$numero = $_POST['numero'];

$query = 'INSERT INTO connexion(nom, prenom, pseudo, mdp, email, numero) VALUES (:nom, :prenom, :pseudo, :mdp, :email, :numero)';
$requete = $bdd->prepare($query);
$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$requete->bindValue(':mdp', $hash, PDO::PARAM_STR);
$requete->bindValue(':email', $email, PDO::PARAM_STR);
$requete->bindValue(':numero', $numero, PDO::PARAM_INT);
$requete->execute();
$_SESSION['message']= '<div id="message" class="alert alert-success text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-check me-3"></i>Votre compte a bien été créé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
header('location:../public/index.php?page=6');
}
?>