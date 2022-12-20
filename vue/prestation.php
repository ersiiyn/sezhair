<!-- ...........................................  Image .................................................. -->
<?php
    // Requete pour les categories 
    $id = 1;
    $queryC = "SELECT * FROM categorie WHERE id=:id";
    $reqC = $bdd->prepare($queryC);
    $reqC->bindValue(':id', $id, PDO::PARAM_STR);
    $reqC->execute();
    $dataC = $reqC -> fetch();
?>

<!-- ...........................................  Coiffure .................................................. -->
<!-- titre -->
<?php
    // Requete pour les categories 
    $querySC = "SELECT * FROM sous_categorie WHERE id_categorie=:id_categorie";
    $reqSC = $bdd->prepare($querySC);
    $reqSC->bindValue(':id_categorie', $dataC['id'], PDO::PARAM_STR);
    $reqSC->execute();
    $cote = true;
    while($dataSC = $reqSC -> fetch()){
        // var_dump($dataSC);
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
                // Requete pour les categories 
                $queryPR = "SELECT * FROM prestations WHERE id_sous_categorie=:id_sous_categorie";
                $reqPR = $bdd->prepare($queryPR);
                $reqPR->bindValue(':id_sous_categorie', $dataSC['id'], PDO::PARAM_STR);
                $reqPR->execute();
                while($dataPR = $reqPR -> fetch()){
                    // var_dump($dataPR);
            ?>
            <div class="box-vert">
                <div class="box-nom-formule"><span class="texte-formule"><?php echo $dataPR['formule'].' .....';?></span></div>
                <div class="box-prix-formule"><span class="prix-formule"><?php echo $dataPR['prix'];?>€</span></div>
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