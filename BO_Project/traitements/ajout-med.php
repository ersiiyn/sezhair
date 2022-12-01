<div class="row">
    <div class="col-md-8 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter une photo</h4>
                <form class="forms-sample" method="POST" action="traitements/traitement-ajout-med.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="photo">Sélectionner votre photo</label>
                        <input type="file" class="form-control text-secondary" id="photo" name="photo">
                    </div>
                    <input type="submit" name="ajouter" class="btn btn-primary" value="Ajouter">
                    <a type="button" class="btn btn-outline-secondary" href="admin.php?page=3">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>