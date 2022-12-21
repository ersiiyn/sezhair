<?php 
    // Index 
    // requete pour afficher les sous catégorie des produits dans le menu déroulant
    function menuProduits($bdd){
        $querySCP = "SELECT * FROM souscat_produits";
        $reqSCP = $bdd->prepare($querySCP);
        $reqSCP->execute();
        $dataSCP = $reqSCP->fetchAll();

        return $dataSCP;
    }

    // Accueil
    // requete pour afficher les blocks dans l'accueil
    function recupBloc($bdd, $id){
        $queryBL = "SELECT * FROM  bloc WHERE id_page = :id ";
        $reqBL = $bdd->prepare($queryBL);
        $reqBL->bindValue(':id', $id, PDO::PARAM_STR);
        $reqBL->execute();
        $dataBL = $reqBL->fetchALL();

        return $dataBL;
    }
// requete pour afficher les elements dans l'accueil

function recupElement($bdd, $idBlock){
    $queryEL = "SELECT * FROM  element WHERE id_bloc = :id ";
            $reqEL = $bdd->prepare($queryEL);
            $reqEL->bindValue(':id', $idBlock, PDO::PARAM_STR);
            $reqEL->execute();
            $dataEL = $reqEL -> fetchAll();

            return $dataEL;
}
    // requete pour recuperer l'équipe
    function recupEquipe($bdd){
        $queryP = "SELECT * FROM presentation";
        $reqP = $bdd->prepare($queryP);
        $reqP->execute();
        $dataP = $reqP->fetchALL();

        return $dataP;
    }

    // Contact 
    // requete pour recupérer les categories (avec l'image si nécessaire)
    function recupImageSezhair($bdd, $id){
        $queryC = "SELECT * FROM categorie WHERE id=:id";
        $reqC = $bdd->prepare($queryC);
        $reqC->bindValue(':id', $id, PDO::PARAM_STR);
        $reqC->execute();
        $dataC = $reqC->fetch();

        return $dataC;
    }

    // requete pour recupérer les coordonnées 
    function recupCoordonnees($bdd){
        $queryCO = "SELECT * FROM contact";
        $reqCO = $bdd->prepare($queryCO);
        $reqCO->execute();
        $dataCO = $reqCO -> fetchAll();

        return $dataCO;
    }

    //Médias 
    // requete pour récuperer les photos
    function recupPhotoMedias($bdd){
        $queryM = "SELECT * FROM medias"; 
        $reqM = $bdd->prepare($queryM);
        $reqM->execute();
        $dataM = $reqM -> fetchAll();

        return $dataM;
    }

    //Prestation 
    // requete pour récuperer les sous categories
    function recupSousCategorie($bdd, $id_SC){
        $querySC = "SELECT * FROM sous_categorie WHERE id_categorie=:id_categorie";
        $reqSC = $bdd->prepare($querySC);
        $reqSC->bindValue(':id_categorie', $id_SC, PDO::PARAM_STR);
        $reqSC->execute();
        $dataSC = $reqSC -> fetchAll();

        return $dataSC;
    }

    // requete pour récuperer les formules
    function recupFormule($bdd, $id_SC){
        $queryPR = "SELECT * FROM prestations WHERE id_sous_categorie=:id_sous_categorie";
        $reqPR = $bdd->prepare($queryPR);
        $reqPR->bindValue(':id_sous_categorie', $id_SC, PDO::PARAM_STR);
        $reqPR->execute();
        $dataPR = $reqPR -> fetchAll();

        return $dataPR;
    }
?>