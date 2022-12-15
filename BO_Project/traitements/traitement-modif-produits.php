<?php
// var_dump($_POST['id']);
include "../bdd.php";
if(isset($_POST['modif_produits'])){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['descriptions']) && !empty($_POST['descriptions'])
        && isset($_POST['prix']) && !empty($_POST['prix'])){

        $id=htmlspecialchars($_POST['id']);
        $nom = $_POST['nom'];
        $descriptions = $_POST['descriptions'];
        $prix = $_POST['prix'];
        $idsouscat = $_POST['souscat'];

        $editequery = $bdd->prepare('UPDATE produits SET nom=:nom, descriptions=:descriptions, prix=:prix WHERE id=:id');
        $editequery->bindValue(':id', $id, PDO::PARAM_INT);
        $editequery->bindValue(':nom', $nom, PDO::PARAM_STR);
        $editequery->bindValue(':descriptions', $descriptions, PDO::PARAM_STR);
        $editequery->bindValue(':prix', $prix, PDO::PARAM_STR);
        $editequery ->execute();
        // Message de modification
        // var_dump($idsouscat);
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../admin.php?page=5&souscat_produits='.$idsouscat);
    }
}
elseif(isset($_POST['modif_photo'])){
    // on récupère les infos du fichier
    $id= $_POST['id'];
    $infos = pathinfo($_FILES['photo']['name']);
    // on vérifie l'extension en mettant en miniscule
    $ext_up = strtolower($infos['extension']);
    if($ext_up != 'jpg' && $ext_up != 'jpeg' && $ext_up != 'png' && $ext_up != 'bmp' && $ext_up != 'gif') {
        $_SESSION['message'] = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Le fichier séléctionné n\'est pas une image <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../admin.php?page=15&id='.$id);
    }
    else {
        $idsouscat = $_POST['souscat'];
        $imgDir = '../../img/produits/';
        $filename = 'avatar-'.time();
        $picture = $imgDir.$filename.'.'.$ext_up;
        $tmp_file = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_file, $picture);
        $picture = $filename.'.'.$ext_up;
        $query = 'UPDATE produits SET photo=:photo WHERE id=:id';
        $req = $bdd->prepare($query);
        $req->bindValue(':photo', $picture, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Photo modifié avec succés <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../admin.php?page=5&souscat_produits='.$idsouscat);
    }
}
?>