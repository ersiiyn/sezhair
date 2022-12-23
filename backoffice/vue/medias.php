<div class="row">
    <div class="col-lg-6 grid-margin stretch-card mx-auto">
        <div class="card">            
            <div class="card-body">
                <h6 class="card-title">Médias</h6>
                <a type="button" class="btn btn-light" href="admin.php?page=11">Ajouter une photo +</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center text-dark">Photo</th>
                                <th class="text-center text-dark">Supprimer</th>
                            </tr>
                        </thead>
                        <?php
                        $dataMed = recupMedias($bdd);
                        foreach($dataMed as $medias){
                        // var_dump($medias);
                        ?>
                        <tbody>
                            <tr>
                                <th class="py-5"><img src="<?php echo '../../public/assets/img/coupe/'.$medias['photo'];?>" alt="image" width="80%"></th>
                                <td class="text-center"><a href="admin.php?page=9&id=<?php echo $medias['id'];?>" class="nav-link text-danger"><i class="link-icon" data-feather="trash-2"></i></a></td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>