<?php

    require '../modele/bdd.php'; //(chemin à adapter)
    $username = $_POST['username'];
    $mdp = $_POST['mdp'];
    
    $query = "SELECT * FROM administrateur WHERE username = :username";
    $req = $bdd->prepare($query);
    $req->bindValue(':username', $username, PDO::PARAM_STR);
    $req->execute();
    
    $data = $req->fetch();
    if (!empty($data)) {
        if(password_verify($mdp, $data['mdp'])) {
            $_SESSION['prenom']= $data['prenom'];
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['admin'] = 'ADMIN';
            
            $_SESSION['message']= '<div id="message" class="alert alert-success text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-check me-3"></i>Bienvenue dans l\'administration <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location: ./admin.php');
        }
        else{
            $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Mot de passe incorrect <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location: ./index.php');
        }
    }
    else{
        $_SESSION['message']= '<div id="message" class="alert alert-danger text-center alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Utilisateur inconnu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location: ./index.php'); // redirection
    }
?>