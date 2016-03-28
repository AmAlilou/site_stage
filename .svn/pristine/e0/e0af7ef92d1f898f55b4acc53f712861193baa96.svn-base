<?php
// Paramètres de connexion à la base de données SOURCE
$sourceHost = "localhost";
$sourceUser = "root";
$sourcePass = "";
$sourceDbName = "stages_miage_old";

// Paramètres de connexion à la base de données DESTINATION
$destHost = "localhost";
$destUser = "root";
$destPass = "";
$destDbName = "stages_miage_migree";


// Spécification du connecteur a la base de données : ici un connecteur MySQL (possibilité d'implémenter d'autres connecteurs ...)
DBConnector::setDBConnectorSource(new MySQLConnector($sourceHost, $sourceUser, $sourcePass, $sourceDbName));
DBConnector::setDBConnector(new MySQLConnector($destHost, $destUser, $destPass, $destDbName));
// Chaines utilisées pour les fonctions sql STR_TO_DATE, DATE_FORMAT et TIME_FORMAT
// C'est le format des dates qui devront être envoyées aux DB* lors d'un insert/update
// C'est également le format de "sortie" que prendra le champ visé lors d'un select
// Note: le format DATETIME va concaténer ces deux formats !
$DATE_FORMAT = "%d/%m/%Y";
$TIME_FORMAT = "%H:%i:%s";
?>