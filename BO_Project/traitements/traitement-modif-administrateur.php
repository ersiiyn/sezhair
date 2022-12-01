<?php
// var_dump($_POST['id']);
include "../bdd.php";
    if(isset($_POST)){
        if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['mdp']) && !empty($_POST['mdp'])){
    $id=htmlspecialchars($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $editequeryPR = $bdd->prepare('UPDATE administrateur SET username=:username, mdp=:mdp WHERE id=:id');
    $editequeryPR->bindValue(':id', $id, PDO::PARAM_INT);
    $editequeryPR->bindValue(':username', $username, PDO::PARAM_STR);
    $editequeryPR->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $editequeryPR ->execute();
    // var_dump($_POST);
    header('location:../admin.php?page=1');
    }
}
?>