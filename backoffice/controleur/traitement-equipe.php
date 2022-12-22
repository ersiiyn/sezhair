<?php
require '../modele/bdd.php';
require '../modele/fonction.php';

    if(isset($_POST['modif_equipe'])){
        if(isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['nom']) && !empty($_POST['nom'])
            && isset($_POST['descriptions']) && !empty($_POST['descriptions'])){

            $id=htmlspecialchars($_POST['id']);
            $nom = $_POST['nom'];
            $descriptions = $_POST['descriptions'];
            // Requete
            $uptadeEquipe = uptadeEquipe($bdd, $id, $nom, $descriptions);
            // Message de modification
            if(isset($_POST['modif_equipe'])){
                $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Modification réussi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                header('location:../public/admin.php?page=1');
            }
        }
    }
    elseif(isset($_POST['modif_photo'])){
        $id= $_POST['id'];
        // on récupère les infos du fichier
        $infos = pathinfo($_FILES['photo']['name']);
        // on vérifie l'extension en mettant en miniscule
        $ext_up = strtolower($infos['extension']);
        if($ext_up != 'jpg' && $ext_up != 'jpeg' && $ext_up != 'png' && $ext_up != 'bmp' && $ext_up != 'gif') {
            $_SESSION['message'] = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Le fichier séléctionné n\'est pas une image <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location:../public/admin.php?page=6&id='.$id);
        }
        else {
            $imgDir = '../../public/assets/img/accueil/';
            $filename = 'equipe-'.time();
            $picture = $imgDir.$filename.'.'.$ext_up;
            $tmp_file = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp_file, $picture);
            $picture = $filename.'.'.$ext_up;
            // Requete 
            $uptadeImageEquipe = uptadeImageEquipe($bdd, $picture, $id);
            $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Photo modifié avec succés <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            header('location:../public/admin.php?page=1');
        }
    }
?>