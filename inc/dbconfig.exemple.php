<?php
////// FICHIER A RENOMMER EN dbconfig.inc.php une fois �dit� ! /////

// Param�tres de connexion � la base de donn�es
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "stages_miage";

// Sp�cification du connecteur a la base de donn�es : ici un connecteur MySQL (possibilit� d'impl�menter d'autres connecteurs ...)
DBConnector::setDBConnector(new MySQLConnector($host, $user, $pass, $dbName));

// Chaines utilis�es pour les fonctions sql STR_TO_DATE, DATE_FORMAT et TIME_FORMAT
// C'est le format des dates qui devront �tre envoy�es aux DB* lors d'un insert/update
// C'est �galement le format de "sortie" que prendra le champ vis� lors d'un select
// Note: le format DATETIME va concat�ner ces deux formats !
// Les dates risquent de ne plus bien marcher par endroit si ces formats sont chang�s ! (il faudra penser � faire un refactor en utilisant UNIQUEMENT les fonction fournies 
// dans le inc/functions.inc.php)
// En tous les cas, s'ils sont chang�s, aller changer les fonctions formattedDateToTime(), timeToFormattedDate(), formattedTimeToTime(), timeToFormattedTime(),
// formattedDateTimeToTime() et timeToFormattedDateTime() du inc/functions.inc.php
$DATE_FORMAT = "%d/%m/%Y";
$TIME_FORMAT = "%H:%i:%s";

// D�sallocation m�moire des param�tres de connexion (s�curit�)
unset($host); unset($user); unset($pass); unset($dbName);
?>