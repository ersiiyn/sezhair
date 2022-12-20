<!-- ...........................................  Image .................................................. -->
<?php
    // Requete pour les categories 
    $id = 2;
    $queryC = "SELECT * FROM categorie WHERE id=:id";
    $reqC = $bdd->prepare($queryC);
    $reqC->bindValue(':id', $id, PDO::PARAM_STR);
    $reqC->execute();
    $dataC = $reqC -> fetch();
?>
<div class="box-image">
    <img class="image-menu" src="<?php echo '../public/assets/img/'.$dataC['image_categorie'];?>">
</div>
<!-- ...........................................  PHOTO .................................................. -->
<div class="box-photo">
    <?php
        // Requete pour les sous categories 
        $queryM = "SELECT * FROM medias"; 
        $reqM = $bdd->prepare($queryM);
        $reqM->execute();
        while($dataM = $reqM -> fetch()){
            // var_dump($dataM);
    ?>
    <div class="photo"><img class="coupe" src="<?php echo '../public/assets/img/coupe/'.$dataM['photo'];?>"></div>
    <?php
        }
    ?>
</div>  