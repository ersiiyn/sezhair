<div class="row m-auto">
    <?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
</div>
<!-- ...........................................  Image .................................................. -->
<?php
    // Requete pour les categories 
    $id = 3;
    $queryC = "SELECT * FROM categorie WHERE id=:id";
    $reqC = $bdd->prepare($queryC);
    $reqC->bindValue(':id', $id, PDO::PARAM_STR);
    $reqC->execute();
    $dataC = $reqC -> fetch();
?>
<div class="box-image">
    <img src="<?php echo $dataC['image_categorie'];?>" width="100%" height="100%">
</div>
<!-- ...........................................  ADRESSE HORAIRE .................................................. -->
<?php
    // Requete pour contact
    $queryCO = "SELECT * FROM contact";
    $reqCO = $bdd->prepare($queryCO);
    $reqCO->execute();
    $dataCO = $reqCO -> fetchAll();
        // var_dump($dataCO);
?>
<div class="box-adresse-contact">
    <div class="box-numero-contact"><span class="numero-contact"><?php echo $dataCO[0]['num'];?></span></div>
    <div class="box-numero-contact"><span class="numero-contact"><?php echo $dataCO[0]['num2'];?></span></div>
    <div class="box-horaire-contact"><span class="horaire-contact"><?php echo $dataCO[0]['horaire'];?></span></div>
    <div class="petite-box-adresse-contact"><span class="adresse-contact"><?php echo $dataCO[0]['adresse'];?><br>
        <?php echo $dataCO[0]['ville'];?></span>
    </div>
</div>
<!-- ...........................................  MAPS .................................................. -->
<div class="box-maps">
    <div class="box-image-maps"><img class="brush" src="./img/brush.jpg"></div>
    <div class="maps"><iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10394.209406836357!2d6.0501714!3d49.3606207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf047e74f71d27798!2sSezhair%20Coiffure%20-%20Coiffeur%2C%20Barbier%20%C3%A0%20Algrange!5e0!3m2!1sfr!2sfr!4v1666083078244!5m2!1sfr!2sfr"
            width="100%" height="85%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- ...........................................  FORMULAIRE MESSAGE .................................................. -->
<div class="container-fluid formulaire">
    <main>
        <div class="py-5 text-center">
            <h2 class="titre-formulaire">Laissez-nous un message</h2>
        </div>
        <!-- Formulaire -->
        <div class="col-md-7 col-lg-8 mx-auto">
            <form method="POST" class="needs-validation" action="./php/traitement-message.php">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nom" class="form-label texte-form">Votre nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="" required="">
                        <div class="invalid-feedback">Votre nom est requis.</div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="email" class="form-label texte-form">Votre mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="toi@exemple.com" required="">
                        <div class="invalid-feedback">Vote email est requis.</div>
                    </div>
                    <div class="col-12">
                        <label for="mot" class="form-label texte-form">Votre message</label>
                        <textarea name="mot" class="form-control" id="mot" required=""></textarea>
                        <div class="invalid-feedback">Vous devez saisir un message.</div>
                    </div>
                    <input type="submit" name="envoie_message" class="w-25 btn btn-lg btn-dark mx-auto mt-5" value="Envoyer">
                </div>
            </form>
        </div>
    </main>
</div>