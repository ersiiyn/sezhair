<?php
// var_dump($_POST['id']);
include "../bdd.php";
    if(isset($_POST['modif_profil'])){
        if(isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['username']) && !empty($_POST['username'])
            && isset($_POST['nom']) && !empty($_POST['nom'])
            && isset($_POST['prenom']) && !empty($_POST['prenom'])){
            $id=htmlspecialchars($_POST['id']);
            $username = htmlspecialchars($_POST['username']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $editequeryPR = $bdd->prepare('UPDATE administrateur SET username=:username, nom=:nom, prenom=:prenom WHERE id=:id');
            $editequeryPR->bindValue(':id', $id, PDO::PARAM_INT);
            $editequeryPR->bindValue(':username', $username, PDO::PARAM_STR);
            $editequeryPR->bindValue(':nom', $nom, PDO::PARAM_STR);
            $editequeryPR->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $editequeryPR ->execute();
            $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location:../admin.php?page=1');
        }
    }
?>