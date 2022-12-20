<?php
require '../modele/bdd.php';

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['formule']) && !empty($_POST['formule'])
        && isset($_POST['prix']) && !empty($_POST['prix'])){

        $id= htmlspecialchars($_POST['id']);
        $formule = htmlspecialchars($_POST['formule']);
        $prix =  htmlspecialchars($_POST['prix']);
        
        $editequeryPR = $bdd->prepare('UPDATE prestations SET formule=:formule, prix=:prix WHERE id=:id');
        $editequeryPR->bindValue(':id', $id, PDO::PARAM_INT);
        $editequeryPR->bindValue(':formule', $formule, PDO::PARAM_STR);
        $editequeryPR->bindValue(':prix', $prix, PDO::PARAM_STR);
        $editequeryPR ->execute();

        // Message de modification
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/admin.php?page=2');
    }
}
?>