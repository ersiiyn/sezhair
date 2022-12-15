<!-- ...........................................  Fleches retour en haut.................................................. -->
<div id="scroll_to_top">
    <a href="#top"><img src="./img/accueil/fleche2.png" alt="Retourner en haut" /></a>
</div>
<!-- ...........................................  Caroussel .................................................. -->
<div class="row mx-auto">
    <?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
</div>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active carousel">
            <img src="./img/accueil/barbe.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>NOS PRESTATIONS</h1>
                <a class="fs-5" href="index.php?page=2">En savoir plus</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/accueil/produits2.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block carousel">
                <h1>NOS PRODUITS</h1>
                    <a class="fs-5" href="index.php?page=3&souscat_produits=1">En savoir plus</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./img/accueil/lunette.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block carousel">
                <h1>MEDIAS</h1>
                    <a class="fs-5" href="index.php?page=4">En savoir plus</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- ...........................................  Services .................................................. -->
<?php
    if(isset($_GET['page'])){
        $id =$_GET['page'];
        // requete
        $queryBL = "SELECT * FROM  bloc WHERE id_page = :id ";
        $reqBL = $bdd->prepare($queryBL);
        $reqBL->bindValue(':id', $id, PDO::PARAM_STR);
        $reqBL->execute();
        // var_dump($data);
        $dataBL = $reqBL -> fetchAll();
        // Incremente
        for($i = 0 ; $i < count($dataBL); $i++){
            $queryEL = "SELECT * FROM  element WHERE id_bloc = :id ";
            $reqEL = $bdd->prepare($queryEL);
            $reqEL->bindValue(':id', $dataBL[$i]['id'], PDO::PARAM_STR);
            $reqEL->execute();
            $dataEL[$i] = $reqEL -> fetchAll();
        }
        // var_dump($dataEL);
?>
<div class="box-service">
    <div class="box-titre-services">
        <div class="box-toilletage"><span class="toilletage"><?php echo $dataEL[0][0]['contenu'];?></span></div>
        <div class="box-services"><span class="services"><?php echo mb_strtoupper($dataEL[0][1]['contenu']); ?></span></div>
    </div>
    <div class="box-logo-services">
        <div class="box-element1">
            <div class="logo-services"><img class="image-logo" src="<?php echo $dataEL[1][0]['contenu'];?>"></div>
            <div class="titre-services"><span class="texte-titre-services"><?php echo $dataEL[1][1]['contenu'];?></span></div>
            <div class="texte-services"><span class="texte-texte-services"><?php echo $dataEL[1][2]['contenu'];?></span></div>
        </div>
        <div class="box-element1">
            <div class="logo-services"><img class="image-logo" src="<?php echo $dataEL[2][0]['contenu'];?>"></div>
            <div class="titre-services"><span class="texte-titre-services"><?php echo $dataEL[2][1]['contenu'];?></span></div>
            <div class="texte-services"><span class="texte-texte-services"><?php echo $dataEL[2][2]['contenu'];?></span></div>
        </div>
        <div class="box-element1">
            <div class="logo-services"><img class="image-logo" src="<?php echo $dataEL[3][0]['contenu'];?>"></div>
            <div class="titre-services"><span class="texte-titre-services"><?php echo $dataEL[3][1]['contenu'];?></span></div>
            <div class="texte-services"><span class="texte-texte-services"><?php echo $dataEL[3][2]['contenu'];?></span></div>
        </div>
    </div>
</div>
<!-- ...........................................  Sezhair .................................................. -->
<div class="box-sezhair">
    <div class="box-image-sezhair"><img class="image-sezhair" src="<?php echo $dataEL[4][0]['contenu'];?>"></div>
    <div class="box-ecriture-sezhair">
        <div class="box-titre-sezhair"><span class="titre-sezhair"><?php echo mb_strtoupper( $dataEL[4][1]['contenu']);?></span></div><br>
        <div class="box-texte-sezhair">
            <p class="texte-sezhair"><?php echo $dataEL[4][2]['contenu'];?></p>
            <p class="texte-sezhair"><?php echo $dataEL[4][3]['contenu'];?></p><br>
            <p class="texte-sezhair"><?php echo $dataEL[4][4]['contenu'];?></p>
            <p class="texte-sezhair"><?php echo $dataEL[4][5]['contenu'];?></p>
        </div>
        <div class="box-button">
            <a href="index.php?page=2"><button type="button" class="btn btn-dark btn-lg">Notre prestation</button></a>
        </div>
    </div>
</div>
<!-- ...........................................  Présentation .................................................. -->
<div class="box-presentation">
    <div class="grande-box-titre-presentation">
        <div class="box-titre-equipe"><span class="equipe"><?php echo $dataEL[5][0]['contenu'];?></span></div>
        <div class="box-titre-presentation"><span class="presentation"><?php echo mb_strtoupper($dataEL[5][1]['contenu']);?></span></div>
    </div>
    <div class="grande-box-presentation">
        <!-- Requete pour les presentations -->
        <?php
            $queryP = "SELECT * FROM presentation";
            $reqP = $bdd->prepare($queryP);
            $reqP->execute();
            while($dataP = $reqP -> fetch()){
                // var_dump($dataP);
        ?>
        <div class="petite-box-presentation">
            <div class="box-image-presentation"><img class="image-presentation" src="<?php echo './img/accueil/'.$dataP['photo'];?>"></div>
            <div class="box-nom-presentation"><span class="nom-presentation"><?php echo $dataP['nom'];?></span></div>
            <div class="box-texte-presentation"><span class="texte-presentation"><?php echo $dataP['descriptions'];?><br></span></div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<!-- ...........................................  Produits .................................................. -->
<div class="box-produits">
    <div class="grande-box-texte-produits">
        <div class="box-ecriture-produits">
            <div class="box-titre-produits"><span class="titre-sezhair"><?php echo mb_strtoupper($dataEL[6][0]['contenu']);?></span></div>
            <div class="box-texte-produits">
                <p class="texte-sezhair"><?php echo $dataEL[6][2]['contenu'];?></p>
                <p class="texte-sezhair"><?php echo $dataEL[6][3]['contenu'];?></p>
            </div>
            <div class="box-button-produits">
                <a href="index.php?page=3&souscat_produits=1"><button type="button" class="btn btn-dark btn-lg">DECOUVRIR</button></a>
            </div>
        </div>
    </div>
    <div class="box-image-produits"><img class="image-produits" src="<?php echo $dataEL[6][1]['contenu'];?>"></div>
</div>
<?php
    }
?>
<!-- ...........................................  Message .................................................. -->
<div class="box-message">
    <div class="box-titre-message">
        <div class="titre-message"><span class="texte-message">Laissez-nous un message</span></div>
    </div>
    <div class="box-bouton-message">
        <div class="bouton-message">
            <a href="index.php?page=5" class="w-75 btn btn-lg btn-light">Votre message</a>
        </div>
    </div>
</div>
