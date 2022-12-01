<?php 
    $query = "SELECT nom FROM contacter WHERE id=:id";
    $requete = $bdd->prepare($query);
    $requete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $requete->execute();
    $data = $requete -> fetch();  
?>
<form method="POST" action="traitements/traitement-supp-contact.php">        
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Confirmation de suppression</h1><br>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Attention si vous supprimer votre élément, il n'apparaîtra plus dans votre liste.
                Êtes-vous sûr de bien vouloir supprimer le message de <?php echo $data['nom'].' ?';?></p>
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                <input class="btn btn-danger btn-lg" type="submit" value="Supprimer" name="supp_contact">
                <a class="btn btn-outline-secondary btn-lg" href="admin.php?page=4">Annuler</a>
            </div>
        </div>
    </div>
</form>