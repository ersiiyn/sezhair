<div class="row">
    <div class="col-md-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter une formule</h4>
                <?php
                $querySC = "SELECT * FROM sous_categorie";
                $reqSC = $bdd->prepare($querySC);
                $reqSC->execute();
                ?>
                <form class="forms-sample" method="POST" action="traitements/traitement-ajout-prest.php">
                    <div class="form-group">
                    <label for="id">Catégorie:</label>
                        <select name="id" id="id">
                            <option value="">--Sélectionner une categorie--</option>
                            <?php
                            while($dataSC = $reqSC -> fetch()){
                            ?>
                            <option value="<?php echo $dataSC['id'];?>"><?php echo $dataSC['nom_sous_categorie'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formule">Nom de la formule</label>
                        <input type="text" class="form-control text-secondary" id="formule" name="formule"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control text-secondary" id="prix" name="prix"
                            autocomplete="off">
                    </div>
                    <input type="submit" name="ajouter" class="btn btn-primary" value="Ajouter">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>