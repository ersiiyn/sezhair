<?php
require '../modele/bdd.php';
require '../modele/fonction.php';

$id=htmlspecialchars($_POST['id']);
deleteFormule($bdd, $id);

if(isset($_POST['supp_prestation'])){
    $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Formule supprimé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
    header('location:../public/admin.php?page=2');
}
?>