<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification du produits</h4>
                <?php
                $queryP = "SELECT * FROM produits WHERE id=:id";
                $reqP = $bdd->prepare($queryP);
                $reqP->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $reqP->execute();
                $dataP = $reqP -> fetch();
                ?>
                <form class="forms-sample" method="POST" action="../controleur/traitement-modif-produits.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control text-secondary" id="nom" name="nom" value="<?php echo $dataP['nom'];?>"
                            autocomplete="off" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="descriptions">Description</label>
                        <textarea class="form-control text-secondary" id="descriptions" name="descriptions" rows="5"><?php echo $dataP['descriptions'] ;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" step="0.01" min="0" class="form-control text-secondary" id="prix" name="prix" value="<?php echo $dataP['prix'];?>"
                            autocomplete="off" placeholder="Username">
                    </div>
                    <input type="submit" name="modif_produits" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=5&souscat_produits=<?php echo $dataP['id_sous_categorie'];?>">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification de la photo</h4>
                <form class="forms-sample" method="POST" action="../controleur/traitement-modif-produits.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                    <input type="hidden" name="souscat" value="<?php echo $dataP['id_sous_categorie'];?>"/>
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