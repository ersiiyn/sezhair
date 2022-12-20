<?php
    require '../modele/bdd.php';

    $id=htmlspecialchars($_POST['id']);
    $idcat=htmlspecialchars($_POST['idcat']);
    $req = $bdd->prepare('DELETE FROM produits WHERE id=:id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    
    if (isset($_POST['supp_produits'])){
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Produits supprimé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
        header('location:../public/admin.php?page=5&souscat_produits='.$idcat);
    }
?>