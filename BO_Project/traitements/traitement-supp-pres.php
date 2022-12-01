<?php
    include "../bdd.php";
    $id=htmlspecialchars($_POST['id']);
    $req = $bdd->prepare('DELETE FROM prestations WHERE id=:id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    
    if (isset($_POST['supp_prestation'])){
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Formule supprimé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
        header('location:../admin.php?page=2');
    }
?>