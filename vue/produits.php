<?php
if(isset($_GET['souscat_produits'])){
    $cat =$_GET['souscat_produits'];
    ?>
    <!-- ...........................................  Fleches retour en haut .................................................. -->
    <div id="scroll_to_top">
        <a href="#top"><img src="../public/assets/img/accueil/fleche2.png" alt="Retourner en haut" /></a>
    </div>
    <!-- ...........................................  Afficher les categories .................................................. -->
    <div class="container-fluid col-12 text-center mt-5 mb-5">
        <div class="row justify-content-center">
            <!-- Requete pour afficher le nom des categories des produits-->
            <?php
                $dataSCPN = recupNavProduits($bdd);
                foreach($dataSCPN as $sous_catproduitsnav){
            ?>
            <div class="col-8 col-lg-auto p-3 m-1">
                <a class="nav-link link-dark lien-produits" href="index.php?page=3&souscat_produits=<?php echo $sous_catproduitsnav['id'];?>"><?php echo $sous_catproduitsnav['nom'];?></a>
            </div>
            <!-- Fin de boucle pour afficher les categories des produits-->
            <?php 
                }
            ?> 
        </div>
    </div>
    <!-- Requete pour afficher le nom des categories des produits dans la box trait -->
    <?php
        // requete
        $dataSCPT = recupSCatProduits($bdd, $cat);
    ?>
    <div class="box-trait">
        <div class="trait">
            <span class="span-trait">
                <a href="index.php?page=1"><i class="bi bi-house"></i></a> <!-- separation --> / <?php echo $dataSCPT['nom'];?>
            </span> 
        </div> 
    </div>
    <?php
        // requete préparé pour recup les sous categories dans une boucle
        $dataSC = recupSCatBoucleProduits($bdd, $cat);
        foreach($dataSC as $SCatboucle){
            // var_dump($Scatboucle['id']);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php
            // requete préparé pour recup les produits
            $id_souscat = $SCatboucle['id'];
            $dataP = recupProduits($bdd, $id_souscat);
            foreach($dataP as $produits){  
            ?>
            <div class="col-12 col-sm-6 col-lg-4 mt-5">
                <div class="card">
                    <img src="../public/assets/img/produits/<?php echo $produits['photo'];?>" class="card-img-top w-50 mx-auto" alt="...">
                    <div class="card-body mx-auto">
                        <h5 class="card-title"><?php echo $produits['nom'];?></h5>
                        <p class="card-text"><?php echo $produits['prix'];?> €</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal<?php echo $produits['id']; ?>">
                        En savoir plus
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal<?php echo $produits['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong><?php echo $produits['nom'];?></strong></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <img src="../public/assets/img/produits/<?php echo $produits['photo'];?>" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                        </div>
                                        <?php echo $produits['descriptions'];?>
                                        <p class="text-primary mx-auto"><?php echo $produits['prix'];?> €</p>
                                        <p class="text-success mx-auto"><?php echo $produits['statut'];?></p>
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
