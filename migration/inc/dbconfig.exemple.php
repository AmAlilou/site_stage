<?php
// Param�tres de connexion � la base de donn�es SOURCE
$sourceHost = "localhost";
$sourceUser = "root";
$sourcePass = "";
$sourceDbName = "stages_miage_old";

// Param�tres de connexion � la base de donn�es DESTINATION
$destHost = "localhost";
$destUser = "root";
$destPass = "";
$destDbName = "stages_miage_migree";


// Sp�cification du connecteur a la base de donn�es : ici un connecteur MySQL (possibilit� d'impl�menter d'autres connecteurs ...)
DBConnector::setDBConnectorSource(new MySQLConnector($sourceHost, $sourceUser, $sourcePass, $sourceDbName));
DBConnector::setDBConnector(new MySQLConnector($destHost, $destUser, $destPass, $destDbName));
// Chaines utilis�es pour les fonctions sql STR_TO_DATE, DATE_FORMAT et TIME_FORMAT
// C'est le format des dates qui devront �tre envoy�es aux DB* lors d'un insert/update
// C'est �galement le format de "sortie" que prendra le champ vis� lors d'un select
// Note: le format DATETIME va concat�ner ces deux formats !
$DATE_FORMAT = "%d/%m/%Y";
$TIME_FORMAT = "%H:%i:%s";
?>