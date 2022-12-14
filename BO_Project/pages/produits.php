<?php 
if(isset($_GET['souscat_produits'])){
    $cat =$_GET['souscat_produits'];
?>
    <div class="row">
        <div class="col-md-10 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php 
                    $queryP = "SELECT * FROM souscat_produits WHERE id =:id";
                    $reqP = $bdd->prepare($queryP);
                    $reqP->bindValue(':id', $cat, PDO::PARAM_INT);
                    $reqP->execute();
                    $dataP = $reqP -> fetch()
                    ?>
                    <h4 class="card-title"> Les produits <span class="text-warning"><?php echo $dataP['nom'];?></span></h4>
                    <a type="button" class="btn btn-light" href="admin.php?page=12">Ajouter un produits +</a>
                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th class="text-center text-dark">Nom</th>
                                    <th class="text-center text-dark">Photo</th>
                                    <th class="text-center text-dark">Description</th>
                                    <th class="text-center text-dark">Statut</th>
                                    <th class="text-center text-dark">Modification</th>
                                    <th class="text-center text-dark">Supprimer</th>
                                </tr>
                            </thead>
                            <?php
                            $queryP = "SELECT * FROM produits WHERE id_sous_categorie =:id_sous_categorie";
                            $reqP = $bdd->prepare($queryP);
                            $reqP->bindValue(':id_sous_categorie', $cat, PDO::PARAM_STR);
                            $reqP->execute();
                            while($dataP = $reqP -> fetch()){
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center tab-overflow text-wrap align-middle text-secondary"><?php echo $dataP['nom'];?></td>
                                    <th class="text-center"><img src="<?php echo '../img/produits/'.$dataP['photo'];?>" width="30%" height="50%"></th>
                                    <td class="tab-overflow text-center text-wrap align-middle text-secondary"><?php echo $dataP['description'];?></td>
                                    <td class="tab-overflow text-center text-wrap align-middle text-secondary"><?php echo $dataP['statut'];?></td>
                                    <td class="text-center"><a href="admin.php?page=6&id=<?php echo $dataP['id'];?>" class="nav-link text-dark"><i class="link-icon" data-feather="settings"></i></a></td>
                                    <td class="text-center"><a href="admin.php?page=6&id=<?php echo $dataP['id'];?>" class="nav-link text-danger"><i class="link-icon" data-feather="trash-2"></i></a></td>
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
<?php } ?>