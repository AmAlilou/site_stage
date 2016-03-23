<?php
////// FICHIER A RENOMMER EN dbconfig.inc.php une fois édité ! /////

// Paramètres de connexion à la base de données
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "stages_miage";

// Spécification du connecteur a la base de données : ici un connecteur MySQL (possibilité d'implémenter d'autres connecteurs ...)
DBConnector::setDBConnector(new MySQLConnector($host, $user, $pass, $dbName));

// Chaines utilisées pour les fonctions sql STR_TO_DATE, DATE_FORMAT et TIME_FORMAT
// C'est le format des dates qui devront être envoyées aux DB* lors d'un insert/update
// C'est également le format de "sortie" que prendra le champ visé lors d'un select
// Note: le format DATETIME va concaténer ces deux formats !
// Les dates risquent de ne plus bien marcher par endroit si ces formats sont changés ! (il faudra penser à faire un refactor en utilisant UNIQUEMENT les fonction fournies 
// dans le inc/functions.inc.php)
// En tous les cas, s'ils sont changés, aller changer les fonctions formattedDateToTime(), timeToFormattedDate(), formattedTimeToTime(), timeToFormattedTime(),
// formattedDateTimeToTime() et timeToFormattedDateTime() du inc/functions.inc.php
$DATE_FORMAT = "%d/%m/%Y";
$TIME_FORMAT = "%H:%i:%s";

// Désallocation mémoire des paramètres de connexion (sécurité)
unset($host); unset($user); unset($pass); unset($dbName);
?>