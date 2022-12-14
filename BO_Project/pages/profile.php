<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification de l'administrateur</h4>
                <?php
                $queryAdm = "SELECT * FROM administrateur WHERE id=:id";
                $reqAdm = $bdd->prepare($queryAdm);
                $reqAdm->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $reqAdm->execute();
                $dataAdm = $reqAdm -> fetch();
                ?>
                <form class="forms-sample" method="POST" action="traitements/traitement-modif-administrateur.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="username">Pseudo</label>
                        <textarea class="form-control text-secondary" id="username" name="username" rows="1"><?php echo $dataAdm['username'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <textarea class="form-control text-secondary" id="nom" name="nom" rows="1"><?php echo $dataAdm['nom'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <textarea class="form-control text-secondary" id="prenom" name="prenom" rows="1"><?php echo $dataAdm['prenom'];?></textarea>
                    </div>
                    <input type="submit" name="modif_profil" class="btn btn-primary" value="Modifier les informations">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=1">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>