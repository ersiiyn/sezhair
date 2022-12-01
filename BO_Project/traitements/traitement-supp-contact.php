<?php
    include "../bdd.php";
    $id=htmlspecialchars($_POST['id']);
    $req = $bdd->prepare('DELETE FROM contacter WHERE id=:id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();

    // Message de confirmation
    if (isset($_POST['supp_contact'])){
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Message supprimé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>';
        header('location:../admin.php?page=4');
    }
?>