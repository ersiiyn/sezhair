<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Contact</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center text-dark">Numéro</th>
                                <th class="text-center text-dark">Numéro portable</th>
                                <th class="text-center text-dark">Horaire</th>
                                <th class="text-center text-dark">Adresse</th>
                                <th class="text-center text-dark">Ville</th>
                                <th class="text-center text-dark">Modification</th>
                            </tr>
                        </thead>
                        <!-- Requete -->
                        <?php
                        $queryCo = "SELECT * FROM contact";
                        $reqCo = $bdd->prepare($queryCo);
                        $reqCo->execute();
                        while($dataCo = $reqCo -> fetch()){
                        // var_dump($dataCo);
                        ?>
                        <tbody>
                            <tr>
                                <td class="text-center text-secondary"><?php echo $dataCo['num'];?></td>
                                <td class="text-center text-secondary"><?php echo $dataCo['num2'];?></td>
                                <td class="text-center text-secondary"><?php echo $dataCo['horaire'];?></td>
                                <td class="text-center text-secondary"><?php echo $dataCo['adresse'];?></td>
                                <td class="text-center text-secondary"><?php echo $dataCo['ville'];?></td>
                                <td class="text-center"><a href="admin.php?page=10&id=<?php echo $dataCo['id'];?>" class="nav-link text-dark"><i class="link-icon" data-feather="settings"></i></a></td>
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
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Vos messages</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center text-dark">Message</th>
                                <th class="text-center text-dark">Nom</th>
                                <th class="text-center text-dark">Email</th>
                                <th class="text-center text-dark">Supprimer</th>
                            </tr>
                        </thead>
                        <?php
                        $queryCon = "SELECT * FROM contacter";
                        $reqCon = $bdd->prepare($queryCon);
                        $reqCon->execute();
                        while($dataCon = $reqCon -> fetch()){
                        // var_dump($dataCon);
                        ?>
                        <tbody>
                            <tr>
                                <td class="text-center tab-overflow text-wrap align-middle text-secondary"><?php echo $dataCon['mot'];?></td>
                                <td class="text-center tab-overflow text-wrap align-middle text-secondary"><?php echo $dataCon['nom'];?></td>
                                <td class="text-center tab-overflow text-wrap align-middle text-secondary"><?php echo $dataCon['email'];?></td>
                                <td class="text-center"><a href="admin.php?page=13&id=<?php echo $dataCon['id'];?>" class="nav-link text-danger"><i class="link-icon" data-feather="trash-2"></i></a></td>
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