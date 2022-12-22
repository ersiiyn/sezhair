<div class="row">
    <div class="col-md-8 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification contact</h4>
                <?php
                $id = $_GET['id'];
                $dataCo = recupCoordById($bdd, $id);
                // var_dump($dataCo);
                ?>
                <form class="forms-sample" method="POST" action="../controleur/traitement-modif-contact.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/> 
                    <div class="form-group">
                        <label for="num">Numéro</label>
                        <textarea class="form-control text-secondary" id="num" name="num" rows="1"><?php echo $dataCo['num'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="num2">Numéro portable</label>
                        <textarea class="form-control text-secondary" id="num2" name="num2" rows="1"><?php echo $dataCo['num2'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="horaire">Horaire</label>
                        <input type="text" class="form-control text-secondary" id="horaire" name="horaire" value="<?php echo $dataCo['horaire'];?>"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control text-secondary" id="adresse" name="adresse" value="<?php echo $dataCo['adresse'];?>"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control text-secondary" id="ville" name="ville" value="<?php echo $dataCo['ville'];?>"
                            autocomplete="off">
                    </div>
                    <input type="submit" name="modif_contact" class="btn btn-primary" value="Modifier">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=4">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>