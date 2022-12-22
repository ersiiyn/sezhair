<?php
// var_dump($_POST['id']);
require '../modele/bdd.php';
require '../modele/fonction.php';

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['num']) && !empty($_POST['num'])
        && isset($_POST['num2']) && !empty($_POST['num2'])
        && isset($_POST['horaire']) && !empty($_POST['horaire'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['ville']) && !empty($_POST['ville'])){

        $id=htmlspecialchars($_POST['id']);
        $num = htmlspecialchars($_POST['num']);
        $num2 = htmlspecialchars($_POST['num2']);
        $horaire = htmlspecialchars($_POST['horaire']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $ville = htmlspecialchars($_POST['ville']);

        $modifCoord = modifCoord($bdd, $id, $num, $num2, $horaire, $adresse, $ville);

        // Message de modification
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/admin.php?page=4');
    }
}
?>