<?php 
if(isset($_GET['souscat_produits'])){
    $cat =$_GET['souscat_produits'];
?>
    <div class="row">
        <div class="col-12 col-lg-10 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php 
                    $souscat_produits = recupSousCatProduits($bdd, $cat);
                    ?>
                    <h4 class="card-title"> Les produits <span class="text-warning"><?php echo $souscat_produits['nom'];?></span></h4>
                    <input type="hidden" name="souscat_produits" value="<?php echo $souscat_produits['id'];?>"/>
                    <a type="button" class="btn btn-light" href="admin.php?page=17">Ajouter un produits +</a>
                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th class="text-center text-dark">Nom</th>
                                    <th class="text-center text-dark">Photo</th>
                                    <th class="text-center text-dark">Description</th>
                                    <th class="text-center text-dark">Prix</th>
                                    <th class="text-center text-dark">Statut</th>
                                    <th class="text-center text-dark">Modification</th>
                                    <th class="text-center text-dark">Supprimer</th>
                                </tr>
                            </thead>
                            <?php
                            $produits = recupProduits($bdd, $cat);
                            foreach($produits as $produit){
                            ?>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?php echo $produit['nom'];?></td>
                                    <th class="text-center"><img src="<?php echo '../../public/assets/img/produits/'.$produit['photo'];?>" width="70%" height="50%"></th>
                                    <td class="tab-overflow text-center text-wrap align-middle text-secondary w-20"><?php echo $produit['descriptions'];?></td>
                                    <td class="tab-overflow text-center text-wrap align-middle text-secondary w-10"><?php echo $produit['prix'];?> €</td>
                                    <td class="tab-overflow text-center text-wrap align-middle text-secondary"><?php echo $produit['statut'];?></td>
                                    <td class="text-center"><a href="admin.php?page=15&id=<?php echo $produit['id'];?>" class="nav-link text-dark"><i class="link-icon" data-feather="settings"></i></a></td>
                                    <td class="text-center"><a href="admin.php?page=16&id=<?php echo $produit['id'];?>" class="nav-link text-danger"><i class="link-icon" data-feather="trash-2"></i></a></td>
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