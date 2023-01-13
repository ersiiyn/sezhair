<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=127.0.0.1:3306;dbname=sezhair;charset=utf8','root','');  //dbname= sezhair est le nom de la bdd
    $bdd-> setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd-> setATTRIBUTE(PDO::ERRMODE_SILENT, PDO::ERRMODE_WARNING);
    $bdd-> setATTRIBUTE(PDO::ATTR_EMULATE_PREPARES,false);
}
catch(PDOexception $e)
{
    echo'echec de la connexion: '.$e->getMessage();
    exit;
}
?>