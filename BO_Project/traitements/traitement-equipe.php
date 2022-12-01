<?php
// var_dump($_POST['id']);
include "../bdd.php";
    if(isset($_POST)){
        if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['descriptions']) && !empty($_POST['descriptions'])
        && isset($_POST['photo']) && !empty($_POST['photo'])){
            $id=htmlspecialchars($_POST['id']);
            $nom = $_POST['nom'];
            $descriptions = $_POST['descriptions'];
            $photo = $_POST['photo'];
            $editequery = $bdd->prepare('UPDATE presentation SET nom=:nom, descriptions=:descriptions, photo=:photo WHERE id=:id');
            $editequery->bindValue(':id', $id, PDO::PARAM_INT);
            $editequery->bindValue(':nom', $nom, PDO::PARAM_STR);
            $editequery->bindValue(':descriptions', $descriptions, PDO::PARAM_STR);
            $editequery->bindValue(':photo', $photo, PDO::PARAM_STR);
            $editequery ->execute();
            // Message de modification
            if (isset($_POST['modif_equipe'])){
                $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                header('location:../admin.php?page=1');
                }
            }
        }
if(isset($_POST['id']) && !empty($_POST['id'])){
    $query = $bdd->prepare("SELECT * FROM presentation WHERE id=:id;");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
}
?>