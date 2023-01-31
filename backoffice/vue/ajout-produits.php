<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un produits</h4>
                <?php
                $sousCatProduitsBoucle = recupSousCatProduitsBoucle($bdd);
                ?>
                <form class="forms-sample" method="POST" action="../controleur/traitement-ajout-prest.php">
                    <div class="form-group">
                    <label for="id">Catégorie:</label>
                        <select name="id" id="id">
                            <option value="">--Sélectionner une categorie--</option>
                            <?php
                            foreach($sousCatProduitsBoucle as $souscat){
                            ?>
                            <option value="<?php echo $souscat['id'];?>"><?php echo $souscat['nom'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom_produits">Nom du produits</label>
                        <input type="text" class="form-control text-secondary" id="nom_produits" name="nom_produits"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="desc_prod">Description du produits</label>
                        <input type="text" class="form-control text-secondary" id="desc_prod" name="desc_prod"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="prix_prod">Prix</label>
                        <input type="text" class="form-control text-secondary" id="prix_prod" name="prix_prod"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="statut_prod">Statut</label>
                        <input type="text" class="form-control text-secondary" id="statut_prod" name="statut_prod"
                            autocomplete="off">
                    </div>
                    <input type="submit" name="ajouter" class="btn btn-primary" value="Ajouter">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=5">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Photo du produits</h4>
                <form class="forms-sample" method="POST" action="../controleur/traitement-ajout-produits.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                    <input type="hidden" name="souscat_produits" value="<?php echo $dataP['id'];?>"/>
                    <div class="form-group">
                        <label for="formFileLg" class="form-label">Sélectionner votre photo</label>
                        <input type="file" class="form-control" id="photo" name="photo"
                            autocomplete="off" value="<?php echo $dataP['photo'];?>" accept="image/png, image/jpeg" enctype="multipart/form-data">
                    </div>
                    <input type="submit" name="modif_photo" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=5&souscat_produits=<?php echo $dataP['id_sous_categorie'];?>">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>