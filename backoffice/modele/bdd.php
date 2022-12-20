<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    date_default_timezone_set('Europe/Brussels');

    try {
        $bdd = new PDO("mysql:host=127.0.0.1:3306;dbname=sezhair;charset=UTF8","root","");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ERRMODE_SILENT, PDO::ERRMODE_WARNING);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(PDOException $e) {
        echo 'Echec de la connexion : '.$e->getMessage();
        exit;
    }
?>