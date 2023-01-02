<!-- ...........................................  Image .................................................. -->
<?php
    // Requete pour les categories 
    $id = 1;
    $dataC = recupImageSezhair($bdd, $id);
?>
<!-- ...........................................  Coiffure .................................................. -->
<!-- titre -->
<?php
    // Requete pour les sous categories 
    $cote = true;
    $id_C = $dataC['id'];
    $dataSC = recupSousCategorie($bdd, $id_C);
    foreach($dataSC as $dataSC){
?>
<div class="box-titre">
    <div class="titre"><span class="texte-coiffure"><?php echo mb_strtoupper($dataSC['nom_sous_categorie']);?></span></div>
</div>
<!-- Tarifs -->
<?php
if($cote ==true){
    $class="box-tarifs";
    echo '<div class="'.$class.'">';
    $cote = false;
}
else{
    $class="box-tarifs-inverser";
    echo '<div class="'.$class.'">';
    $cote =true;
}
?>
    <div class="box-formule">
        <div class="formule">
            <?php
                // Requete pour les formules
                $id_SC = $dataSC['id'];
                $dataPR = recupFormule($bdd, $id_SC);
                foreach($dataPR as $formule){
                // var_dump($dataPR);
            ?>
            <div class="box-vert">
                <div class="box-nom-formule"><span class="texte-formule"><?php echo $formule['formule'].' .....';?></span></div>
                <div class="box-prix-formule"><span class="prix-formule"><?php echo $formule['prix'];?>€</span></div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="box-image-formule"><img class="image-formule" src="../public/assets/<?php echo $dataSC['image'];?>"></div>
</div>
<!-- Fin boule while pour les sous categories -->
<?php
    }
?>