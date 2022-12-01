<!-- ...........................................  PRESENTATION COIFFURE .................................................. -->
<?php
    // Requete pour les sous categories 
    $querySC = "SELECT * FROM sous_categorie WHERE id_categorie=:id_categorie"; 
    $reqSC = $bdd->prepare($querySC);
    $reqSC->bindValue(':id_categorie', $data['id'], PDO::PARAM_STR);
    $reqSC->execute();
    while($data = $reqSC -> fetch()){
        // var_dump($data);
?>
<div class="box-coiffure">
    
    <div class="box-tarif-coiffure">
        <div class="petite-box-tarif-coiffure">
            <div class="box-titre-coiffure"><span class="titre-coiffure"><?php echo mb_strtoupper($data['nom_sous_categorie']);?></span></div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Shampoing - Coupe .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">17€</span></div>
            </div>
        </div>
    </div>
    
    <div class="box-image-coiffure"><img src="<?php echo $data['image'];?>"></div>
    
</div>
<?php 
    }
?>

<!-- ...........................................  PRESENTATION COIFFURE .................................................. -->
<div class="box-coiffure">
    <div class="box-tarif-coiffure">
        <div class="petite-box-tarif-coiffure">
            <div class="box-titre-coiffure"><span class="titre-coiffure">PRÉSENTATION COIFFURE</span></div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Shampoing - Coupe .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">17€</span></div>
            </div>
        </div>
    </div>
    <div class="box-image-coiffure"><img src="./img/prestation/benchmark.png"></div>
</div>
<!-- ...........................................  PRESENTATION BARBIER .................................................. -->
<div class="box-coiffure">
    <div class="box-image-coiffure"><img src="./img/prestation/echec.png"></div>
    <div class="box-tarif-barbier"><!-- Box a changer pour les soins -->
        <div class="petite-box-tarif-coiffure">
            <div class="box-titre-coiffure"><span class="titre-coiffure">PRÉSENTATION BARBIER</span></div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Shampoing - Coupe .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">17€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Shampoing - Coupe - Barbe .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">24€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Coupe Enfants .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">13€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Coupe Enfants Dégradé à Blanc .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">15€</span></div>
            </div>
        </div>
    </div>
</div>
<!-- ...........................................  PRESENTATION SOINS RELAXATION .................................................. -->
<div class="box-coiffure">
    <div class="box-tarif-coiffure">
        <div class="petite-box-tarif-coiffure">
            <div class="box-titre-coiffure"><span class="titre-coiffure">PRÉSENTATION SOINS ET RELAXATIONS</span></div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Shampoing - Coupe .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">17€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Epilation A La Cire .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">24€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Masque Au Visage Classique .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">13€</span></div>
            </div>
            <div class="box-texte-coiffure">
                <div class="box-description-coiffure"><span class="texte-coiffure">Soin Du Visage,Soin Serviette Chaude .....</span></div>
                <div class="prix-coiffure"><span class="texte-coiffure">15€</span></div>
            </div>
        </div>
    </div>
    <div class="box-image-coiffure"><img src="./img/prestation/haricuts.png"></div>
</div>