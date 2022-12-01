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
                // var_dump($dataPR);
                ?>
                <form class="forms-sample" method="POST" action="traitements/traitement-modif-administrateur.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="num">Pseudo</label>
                        <textarea class="form-control text-secondary" id="num" name="num" rows="1"><?php echo $dataAdm['username'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot-de-passe</label>
                        <input placeholder="Votre mot de passe doit contenir entre 8 et 15 caractères et posséder au minimum une minuscule, une majuscule, un chiffre et un caractère spéciale. (ex: +-%$...)" type="password" 
                        class="form-control text-secondary" id="mdp" name="mdp" minlength="8" maxlength="15" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Comfirmer le mot-de-passe</label>
                        <input placeholder="Vérification du mot de passe" type="password" class="form-control text-secondary" id="mdp" name="mdp" minlength="8" maxlength="15"
                            autocomplete="off" required>
                    </div>
                    <input type="submit" name="envoyer" class="btn btn-primary" value="Modifier les informations">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=1">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>