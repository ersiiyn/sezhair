<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification préstations</h4>
                <?php
                $queryPR = "SELECT formule,prix FROM prestations WHERE id=:id";
                $reqPR = $bdd->prepare($queryPR);
                $reqPR->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $reqPR->execute();
                $dataPR = $reqPR -> fetch();
                // var_dump($dataPR);
                ?>
                <form class="forms-sample" method="POST" action="../controleur/traitement-prestations.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="formule">Formule</label>
                        <textarea class="form-control text-secondary" id="formule" name="formule" rows="1"><?php echo $dataPR['formule'] ;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control text-secondary" id="prix" name="prix" value="<?php echo $dataPR['prix'];?>"
                            autocomplete="off">
                    </div>
                    <input type="submit" name="modif-prest" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>