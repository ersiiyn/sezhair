<?php 
    $query = "SELECT nom,photo,id_sous_categorie FROM produits WHERE id=:id";
    $requete = $bdd->prepare($query);
    $requete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $requete->execute();
    $data = $requete -> fetch();  
?>
<form method="POST" action="traitements/traitement-supp-produits.php">        
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Confirmation de suppression</h1><br>
        <div class="col-lg-6 mx-auto">
            <p class="lead">Attention si vous supprimé votre élément, il n'apparaîtra plus dans votre liste.
                Êtes-vous sûr de bien vouloir supprimer:
            </p>
            <p class="lead mb-4 mt-1 text-danger"><?php echo $data['nom'].' ?';?></p>
            <img class="mb-5" src="<?php echo '../img/produits/'.$data['photo'];?>" alt="image" width="50%">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                <input type="hidden" name="idcat" value="<?php echo $data['id_sous_categorie'];?>"/> 
                <input class="btn btn-danger btn-lg" type="submit" value="Supprimer" name="supp_produits">
                <a class="btn btn-outline-secondary btn-lg" href="admin.php?page=5&souscat_produits=<?php echo $data['id_sous_categorie'];?>">Annuler</a>
            </div>
        </div>
    </div>
</form>