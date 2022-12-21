<!-- ...........................................  Image .................................................. -->
<?php
    // Requete pour les categories 
    $id = 2;
    $dataC = recupImageSezhair($bdd, $id);
?>
<div class="box-image">
    <img class="image-menu" src="<?php echo '../public/assets/img/'.$dataC['image_categorie'];?>">
</div>
<!-- ...........................................  PHOTO .................................................. -->
<div class="box-photo">
    <?php
        // Requete pour les photos 
        $dataM = recupPhotoMedias($bdd);
        foreach($dataM as $medias){
    ?>
    <div class="photo"><img class="coupe" src="<?php echo '../public/assets/img/coupe/'.$medias['photo'];?>"></div>
    <?php
        }
    ?>
</div>  