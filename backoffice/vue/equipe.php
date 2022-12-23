<div class="row">
    <div class="col-12 col-lg-10 grid-margin stretch-card mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notre équipe</h4>
                <div class="table-responsive">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th class="text-center text-dark">Nom</th>
                                <th class="text-center text-dark">Description</th>
                                <th class="text-center text-dark">Photo</th>
                                <th class="text-center text-dark">Modification</th>
                            </tr>
                        </thead>
                        <?php
                        $dataPrs = recupEquipe($bdd);
                        foreach($dataPrs as $dataPrs){
                        // var_dump($dataPrs);
                        ?>
                        <tbody>
                            <tr>
                                <td class="text-center tab-overflow text-wrap align-middle text-secondary"><?php echo $dataPrs['nom'];?></td>
                                <td class="tab-overflow text-center text-wrap align-middle text-secondary"><?php echo $dataPrs['descriptions'];?></td>
                                <th class="text-center"><img src="<?php echo '../../public/assets/img/accueil/'.$dataPrs['photo'];?>" width="30%" height="50%"></th>
                                <td class="text-center"><a href="admin.php?page=6&id=<?php echo $dataPrs['id'];?>" class="nav-link text-dark"><i class="link-icon" data-feather="settings"></i></a></td>
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