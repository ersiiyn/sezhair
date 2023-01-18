<!-- Traitement pour ajouter une formule -->
<?php
require '../modele/bdd.php';
require '../modele/fonction.php';
if((isset($_POST['formule']) 
    && isset($_POST['prix']) 
    && isset($_POST['id'])) 
    && ($_POST['formule'] !=null 
    && $_POST['id'] !=null 
    && $_POST['prix'] !=null)){

    $formule = $_POST['formule'];
    $prix = $_POST['prix'];
    $id = $_POST['id'];

    $insertPrestation = insertPrestation($bdd, $formule, $prix, $id);

    // Message de confirmation 
    $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Formule ajouté avec succès ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    // Redirection
    header('location:../public/admin.php?page=2');
}
?>