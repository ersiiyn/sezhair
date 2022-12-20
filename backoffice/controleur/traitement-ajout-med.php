<!-- Traitement pour ajouter une photo -->
<?php
require '../modele/bdd.php';

if(isset($_POST['ajouter'])){

    // on récupère les infos du fichier
    $infos = pathinfo($_FILES['photo']['name']);
    // on vérifie l'extension en mettant en miniscule
    $ext_up = strtolower($infos['extension']);

    if($ext_up != 'jpg' && $ext_up != 'jpeg' && $ext_up != 'png' && $ext_up != 'bmp' && $ext_up != 'gif') {
        $_SESSION['message'] = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Le fichier séléctionné n\'est pas une image <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../admin.php?page=11');
    }
    else {
        $imgDir = '../../public/assets/img/coupe/';
        $filename = 'coupe-'.time();
        $picture = $imgDir.$filename.'.'.$ext_up;
        $tmp_file = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_file, $picture);
        $picture = $filename.'.'.$ext_up;
        $query = 'INSERT INTO medias (photo) VALUES (:photo)';
        $req = $bdd->prepare($query);
        $req->bindValue(':photo', $picture, PDO::PARAM_STR);
        $req->execute();
        $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Photo ajouté avec succés <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        header('location:../public/admin.php?page=3');
    }
}
?>