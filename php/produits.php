<?php
if(isset($_GET['souscat_produits'])){
    $cat =$_GET['souscat_produits'];
    ?>
    <div class="container-fluid col-12 text-center mt-5 mb-5">
        <div class="row justify-content-center">
            <?php
                $querySCPC = "SELECT * FROM souscat_produits";
                $reqSCPC = $bdd->prepare($querySCPC);
                $reqSCPC->execute();
                while($dataSCPC = $reqSCPC -> fetch()){
            ?>
            <div class="col-12 col-sm-6 col-lg p-3">
                <a class="nav-link link-dark lien-produits" href="index.php?page=3&souscat_produits=<?php echo $dataSCPC['id'];?>"><?php echo $dataSCPC['nom'];?></a>
            </div>
            <?php 
                }
            ?> <!-- Fin de boucle -->
        </div>
        <!-- Fin div pour le bloc des categories -->
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
        // boucle
        while($dataSC = $reqSC -> fetch()){
            // var_dump($dataSC);
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
                        <a href="#" class="btn btn-light">En savoir plus</a>
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
    echo '<div class="alert alert-danger text-center alert-dismissible fade show mt-5 mb-5" role="alert"> OUPS .. Cette page n\'est pas accessible veuillez retourner a l\'accueil <a class="nav-link text-dark" href="index.php?page=1"> ACCUEIL </a><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
} 
?> 
