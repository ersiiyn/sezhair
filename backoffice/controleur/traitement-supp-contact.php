<?php
    require '../modele/bdd.php';
    require '../modele/fonction.php';

    $id = htmlspecialchars($_POST['id']);
    $suppMessage = suppMessage($bdd, $id);

    // Message de confirmation
    if (isset($_POST['supp_contact'])){
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Message suppprimé<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/admin.php?page=4');
    }
?>