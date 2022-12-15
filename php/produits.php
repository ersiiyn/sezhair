<?php
if(isset($_GET['souscat_produits'])){
    $cat =$_GET['souscat_produits'];
    ?>
    <!-- ...........................................  Fleches retour en haut .................................................. -->
    <div id="scroll_to_top">
        <a href="#top"><img src="./img/accueil/fleche2.png" alt="Retourner en haut" /></a>
    </div>
    <!-- ...........................................  Afficher les categories .................................................. -->
    <div class="container-fluid col-12 text-center mt-5 mb-5">
        <div class="row justify-content-center">
            <!-- Requete pour afficher les categories des produits-->
            <?php
                $querySCPC = "SELECT * FROM souscat_produits";
                $reqSCPC = $bdd->prepare($querySCPC);
                $reqSCPC->execute();
                while($dataSCPC = $reqSCPC -> fetch()){
            ?>
            <div class="col-12 col-sm-6 col-lg p-3">
                <a class="nav-link link-dark lien-produits" href="index.php?page=3&souscat_produits=<?php echo $dataSCPC['id'];?>"><?php echo $dataSCPC['nom'];?></a>
            </div>
            <!-- Fin de boucle pour afficher les categories des produits-->
            <?php 
                }
            ?> 
        </div>
    </div>
    <!-- Affichage du nom de la categorie dans la box trait -->
    <?php
        // requete
        $queryC = "SELECT * FROM souscat_produits WHERE id= :id";
        $reqC = $bdd->prepare($queryC);
        $reqC->bindValue(':id', $cat, PDO::PARAM_STR);
        $reqC->execute();
        $data = $reqC -> fetch();
    ?>
    <div class="box-trait">
        <div class="trait">
            <span class="span-trait">
                <a href="index.php?page=1"><i class="bi bi-house"></i></a> <!-- separation --> / <?php echo $data['nom'];?>
            </span> 
        </div> 
    </div>
    <?php
        // requete préparé pour recup les sous categories 
        $querySC = "SELECT * FROM  souscat_produits WHERE id= :id";
        $reqSC = $bdd->prepare($querySC);
        $reqSC->bindValue(':id', $cat, PDO::PARAM_STR);
        $reqSC->execute();
        while($dataSC = $reqSC -> fetch()){
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php
            $queryP = "SELECT * FROM produits WHERE id_sous_categorie =:id_sous_categorie";
            $reqP = $bdd->prepare($queryP);
            $reqP->bindValue(':id_sous_categorie', $dataSC['id'], PDO::PARAM_STR);
            $reqP->execute();
            while($dataP = $reqP -> fetch()){
                // var_dump($dataP);      
            ?>
            <div class="col-12 col-sm-6 col-lg-4 mt-5">
                <div class="card">
                    <img src="./img/produits/<?php echo $dataP['photo'];?>" class="card-img-top w-50 mx-auto" alt="...">
                    <div class="card-body mx-auto">
                        <h5 class="card-title"><?php echo $dataP['nom'];?></h5>
                        <p class="card-text"><?php echo $dataP['prix'];?> €</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        En savoir plus
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $dataP['nom'];?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="./img/produits/<?php echo $dataP['photo'];?>" class="w-100" alt="...">
                                <?php echo $dataP['descriptions'];?>
                                <p class="text-primary mx-auto"><?php echo $dataP['prix'];?> €</p>
                                <p class="text-success mx-auto"><?php echo $dataP['statut'];?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin boucle produits -->
            <?php } ?>
        </div>
    </div>
    <!-- Fin boucle sous categorie -->
    <?php } ?>
<!-- Fin boucle url -->
<?php 
}
else{
    echo '<div class="alert alert-danger text-center alert-dismissible fade show mt-5 mb-5" role="alert">OUPS .. Cette page n\'est pas accessible, veuillez retourner à l\'accueil. <a class="nav-link text-dark" href="index.php?page=1">ACCUEIL</a><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
} 
?> 
