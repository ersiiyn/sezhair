<div class="row">
    <div class="col-12 col-lg-10 grid-margin stretch-card mx-auto">
        <div class="card">               
            <div class="card-body">
                <h6 class="card-title">Préstations</h6> 
                <a type="button" class="btn btn-light" href="admin.php?page=12">Ajouter une formule +</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-dark">Nom de la formule</th>
                                <th class="text-dark">Tarifs</th>
                                <th class="text-dark">Categorie</th>
                                <th class="text-dark">Modification</th>
                                <th class="text-dark">Supprimer</th>
                            </tr>
                        </thead>
                        <?php
                        $dataSC = recupSousCategorie($bdd);
                        foreach($dataSC as $sc){
                        // var_dump($sc);
                        $dataPR = recupPrestations($bdd, $sc['id']);
                        foreach($dataPR as $pr){
                        // var_dump($pr);
                        ?>
                        <tbody>
                            <tr>
                                <td class="tab-overflow text-wrap align-middle text-secondary"><?php echo $pr['formule'];?></td>
                                <td class="text-secondary"><?php echo $pr['prix'].' €';?></td>
                                <td class="text-secondary"><?php echo $sc['nom_sous_categorie'];?></td>
                                <td><a href="admin.php?page=7&id=<?php echo $pr['id'];?>" class="nav-link text-dark"><i class="link-icon" data-feather="settings"></i></a></td>
                                <td><a href="admin.php?page=8&id=<?php echo $pr['id'];?>" class="nav-link text-danger"><i class="link-icon" data-feather="trash-2"></i></a></td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>