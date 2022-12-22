<?php
    // Médias
    // Requete pour afficher les photos dans medias 
    function recupMedias($bdd){
        $queryMed = "SELECT * FROM medias";
        $reqMed = $bdd->prepare($queryMed);
        $reqMed->execute();
        $dataMed = $reqMed->fetchAll();

        return $dataMed;
    }

    // Requete pour afficher les photos en boucle dans medias 
    function recupIdMedias($bdd, $id_medias){
        $query = "SELECT photo FROM medias WHERE id=:id";
        $requete = $bdd->prepare($query);
        $requete->bindValue(':id', $id_medias, PDO::PARAM_INT);
        $requete->execute();
        $dataIdMed = $requete->fetch();

        return $dataIdMed;
    }

    // Suppression medias
    function suppMedias($bdd, $id){
        $req = $bdd->prepare('DELETE FROM medias WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    // Ajout medias
    function ajoutMedias($bdd, $picture){
        $query = 'INSERT INTO medias (photo) VALUES (:photo)';
        $req = $bdd->prepare($query);
        $req->bindValue(':photo', $picture, PDO::PARAM_STR);
        $req->execute();
    }

    // Contact
    // Requete pour afficher les coordonnées dans contact
    function recupCoord($bdd){
        $queryCo = "SELECT * FROM contact";
        $reqCo = $bdd->prepare($queryCo);
        $reqCo->execute();
        $dataCo = $reqCo->fetchAll();

        return $dataCo;
    }

    // Requete pour afficher les coordonnées dans modifier contact
    function recupCoordById($bdd, $id){
        $queryCo = "SELECT num, num2, horaire, adresse, ville FROM contact WHERE id=:id";
        $reqCo = $bdd->prepare($queryCo);
        $reqCo->bindValue(':id', $id, PDO::PARAM_INT);
        $reqCo->execute();
        $dataCo = $reqCo -> fetch();

        return $dataCo; 
    }

    // Requete pour modifier les coordonnées dans traitement modif contact 
    function modifCoord($bdd, $id, $num, $num2, $horaire, $adresse, $ville){
        $editequeryCo = $bdd->prepare('UPDATE contact SET num=:num, num2=:num2, horaire=:horaire, adresse=:adresse, ville=:ville WHERE id=:id');
        $editequeryCo->bindValue(':id', $id, PDO::PARAM_INT);
        $editequeryCo->bindValue(':num', $num, PDO::PARAM_STR);
        $editequeryCo->bindValue(':num2', $num2, PDO::PARAM_STR);
        $editequeryCo->bindValue(':horaire', $horaire, PDO::PARAM_STR);
        $editequeryCo->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $editequeryCo->bindValue(':ville', $ville, PDO::PARAM_STR);
        $editequeryCo ->execute();
    }

    // Requete pour afficher les messages
    function recupMessag($bdd){
        $queryMessage = "SELECT * FROM contacter";
        $reqMessage = $bdd->prepare($queryMessage);
        $reqMessage->execute();
        $dataMessage = $reqMessage->fetchAll();

        return $dataMessage;
    }

    // Requete pour supprimer un message
    function recupMessageById($bdd, $id_message){
        $query = "SELECT nom FROM contacter WHERE id=:id";
        $requete = $bdd->prepare($query);
        $requete->bindValue(':id', $id_message, PDO::PARAM_INT);
        $requete->execute();
        $dataMessage = $requete -> fetch(); 

        return $dataMessage;
    }

    // Requete pour supprimer un message 
    function suppMessage($bdd, $id){
        $req = $bdd->prepare('DELETE FROM contacter WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    // Equipe 
    // Requete pour recuperer l'equipe
    function recupEquipe($bdd){
        $queryPrs = "SELECT * FROM presentation";
        $reqPrs = $bdd->prepare($queryPrs);
        $reqPrs->execute();
        $dataPrs = $reqPrs -> fetchAll();

        return $dataPrs;
    }

    // Requete pour recuperer l'equipe dans modifier 
    function recupEquipeById($bdd){
        $queryPrsID = "SELECT nom,descriptions,photo FROM presentation WHERE id=:id";
        $reqPrsID = $bdd->prepare($queryPrsID);
        $reqPrsID->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $reqPrsID->execute();
        $dataPrsID = $reqPrsID -> fetch();

        return $dataPrsID;
    }

    // Requete pour modifier l'equipe
    function uptadeEquipe($bdd, $id, $nom, $descriptions){
        $editequery = $bdd->prepare('UPDATE presentation SET nom=:nom, descriptions=:descriptions WHERE id=:id');
        $editequery->bindValue(':id', $id, PDO::PARAM_INT);
        $editequery->bindValue(':nom', $nom, PDO::PARAM_STR);
        $editequery->bindValue(':descriptions', $descriptions, PDO::PARAM_STR);
        $editequery ->execute();
    }

    // Requete pour modifier l'image dans equipe
    function uptadeImageEquipe($bdd, $picture, $id){
        $query = 'UPDATE presentation SET photo=:photo WHERE id=:id';
        $req = $bdd->prepare($query);
        $req->bindValue(':photo', $picture, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
?>