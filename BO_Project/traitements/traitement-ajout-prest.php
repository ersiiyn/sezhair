<!-- Traitement pour ajouter une formule -->
<?php
include "../bdd.php";
if((isset($_POST['formule']) 
    && isset($_POST['prix']) 
    && isset($_POST['id'])) 
    && ($_POST['formule'] !=null 
    && $_POST['id'] !=null 
    && $_POST['prix'] !=null)){

    $formule = $_POST['formule'];
    $prix = $_POST['prix'];
    $id = $_POST['id'];

    $query = 'INSERT INTO prestations(formule, prix, id_sous_categorie) VALUES (:formule, :prix, :id_sous_categorie)';
    $requete = $bdd->prepare($query);
    $requete->bindValue(':formule', $formule, PDO::PARAM_STR);
    $requete->bindValue(':prix', $prix, PDO::PARAM_STR);
    $requete->bindValue(':id_sous_categorie', $id, PDO::PARAM_INT);
    $requete->execute();

    // Message de confirmation 
    $_SESSION['message'] = '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Formule ajouté avec succès ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    // Redirection
    header('location:../admin.php?page=2');
}
?>