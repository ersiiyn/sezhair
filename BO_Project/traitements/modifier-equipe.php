<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'équipe</h4>
                <?php
                $queryPrs = "SELECT nom,descriptions,photo FROM presentation WHERE id=:id";
                $reqPrs = $bdd->prepare($queryPrs);
                $reqPrs->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $reqPrs->execute();
                $dataPrs = $reqPrs -> fetch();
                // var_dump($dataPrs);
                ?>
                <form class="forms-sample" method="POST" action="traitements/traitement-equipe.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control text-secondary" id="nom" name="nom" value="<?php echo $dataPrs['nom'];?>"
                            autocomplete="off" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="descriptions">Description</label>
                        <textarea class="form-control text-secondary" id="descriptions" name="descriptions" rows="3"><?php echo $dataPrs['descriptions'] ;?></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="formFileLg" class="form-label">Sélectionner votre photo</label>
                        <input type="text" class="form-control" id="photo" name="photo"
                            autocomplete="off" value="<?php echo $dataPrs['photo'];?>" accept="image/png, image/jpeg" enctype="multipart/form-data">
                    </div> -->
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
                <form class="forms-sample" method="POST" action="traitements/traitement-equipe.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="formFileLg" class="form-label">Sélectionner votre photo</label>
                        <input type="file" class="form-control" id="photo" name="photo"
                            autocomplete="off" value="<?php echo $dataPrs['photo'];?>" accept="image/png, image/jpeg" enctype="multipart/form-data">
                    </div>
                    <input type="submit" name="modif_photo" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=1">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>