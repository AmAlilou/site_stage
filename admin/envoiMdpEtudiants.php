<?php
set_include_path("." . PATH_SEPARATOR . "..");
require_once("inc/main.inc.php");

// R&#233;cup&#233;ration de tous les &#233;tudiants de l'ann&#233;e en cours
$etudiants = DBEtudiant::getRecords("", "", "", "", "", "", "", "", DBConfig::getConfigValue("ANNEE PROMO"));
$envoisOK = 0;
foreach($etudiants as $etd)
    $envoisOK += (($etd->sendPass(false) == "")?1:0);

echo "$envoisOK / ".count($etudiants)." envoi(s) ont &#233;t&#233; effectu&#233;s (les erreurs surviennent lorsqu'aucun mail n'est disponible pour les &#233;tudiants concern&#233;s).";
?>