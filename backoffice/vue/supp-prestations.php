<?php 
    $id = $_GET['id'];
    $dataForm = recupFormule($bdd, $id);
?>
<form method="POST" action="../controleur/traitement-supp-pres.php">        
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Confirmation de suppression</h1><br>
        <div class="col-lg-6 mx-auto">
            <p class="lead">Attention si vous supprimer votre élément, il n'apparaîtra plus dans votre liste.
                Êtes-vous sûr de bien vouloir supprimer
            </p>
            <p class="lead mb-4 text-danger"><?php echo $dataForm['formule'].' ?';?></p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                <input class="btn btn-danger btn-lg" type="submit" value="Supprimer" name="supp_prestation">
                <a class="btn btn-outline-secondary btn-lg" href="admin.php?page=2">Annuler</a>
            </div>
        </div>
    </div>
</form>