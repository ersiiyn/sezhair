<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'équipe</h4>
                <?php
                $dataPrsId = recupEquipeById($bdd, $_GET['id']);
                ?>
                <form class="forms-sample" method="POST" action="../controleur/traitement-equipe.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control text-secondary" id="nom" name="nom" value="<?php echo $dataPrsId['nom'];?>"
                            autocomplete="off" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="descriptions">Description</label>
                        <textarea class="form-control text-secondary" id="descriptions" name="descriptions" rows="3"><?php echo $dataPrsId['descriptions'] ;?></textarea>
                    </div>
                    <input type="submit" name="modif_equipe" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=1">Annuler</a>
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
                <form class="forms-sample" method="POST" action="../controleur/traitement-equipe.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                    <input type="hidden" name="id_photo" value="<?php echo $_GET['id'];?>"/>
                    <div class="form-group">
                        <label for="formFileLg" class="form-label">Sélectionner votre photo</label>
                        <input type="file" class="form-control" id="photo" name="photo"
                            autocomplete="off" value="<?php echo $dataPrsId['photo'];?>" accept="image/png, image/jpeg" enctype="multipart/form-data">
                    </div>
                    <input type="submit" name="modif_photo" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=1">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>