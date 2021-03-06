<?php
////// FICHIER A RENOMMER EN config.inc.php une fois �dit� ! /////

////////// RACINE DU SITE EN LOCAL: A CHANGER !! /////////////////
$ROOT_PATH = "F:\\wamp\\www\\site_stages";

//$ROOT_PATH = "/var/www/stages";
//////////////////////////////////////////////////////////////////

/////////// RACINE DU SITE (HTTP): A CHANGER !! //////////////////
$URL_ROOT_PATH = "http://localhost";

//$URL_ROOT_PATH = "https://miage.emi.u-bordeaux1.fr";
//////////////////////////////////////////////////////////////////

///// RACINE DU SITE (HTTP) SANS PORTS: A CHANGER !! /////////////
// A noter que si aucun port n'est utilis� dans le URL_ROOT_PATH,
// cette variable doit avoir la meme valeur que URL_ROOT_PATH
// Cette variable sert pour les balises <link> puisque une url
// du type <link href="http://myServ:12345/myFile"> n'est pas
// interpr�t�e sous IE ... il faut le remplacer par
// <link href="http://myServ/myFile">

$URL_ROOT_PATH_WITHOUT_PORTS = "http://localhost";


//$URL_ROOT_PATH_WITHOUT_PORTS = "https://miage.emi.u-bordeaux1.fr";
//////////////////////////////////////////////////////////////////

/////////// INDEX DU MEDIAWIKI (HTTP): A CHANGER !! //////////////
$MEDIAWIKI_ROOT_PATH = "https://miage.emi.u-bordeaux1.fr/prod/mediawiki/index.php";
//////////////////////////////////////////////////////////////////

/////////// INDEX DU SITE MIAGE (HTTP): A CHANGER !! /////////////
$SITE_MIAGE_ROOT_PATH = "http://localhost";
//"https://miage.emi.u-bordeaux1.fr/prod/accueil/";
//////////////////////////////////////////////////////////////////

///////////////// Classes a inclure "en priorit�" ////////////////
// Ces classes sont rajout�es pour �viter des problemes d'include
// entre le module de migration de la base et le module du nouveau
// site. Elles permettent �galement de d�finir des ordres de
// priorit� sur les diff�rents includes effectu�s dans le
// main.inc.php
$PRIOR_CLASSES = array(
        "class/ISelectable.class.php",
        "class/DBConnector.class.php",
        "class/DBConnectors/MySQLConnector.class.php",
        "class/FormObject.class.php",
        "class/FormObjects/FOConcerne.class.php",
        "class/FormObjects/FOCreationPropositionStage.class.php"
        );
//////////////////////////////////////////////////////////////////

//////// R�pertoires du site � "chercher" pour les classes ///////
$CLASS_DIRS = array(
        "class/",
        "class/FormObjects/",
        "class/DBClasses/",
        "class/DBConnectors/"
        );
//////////////////////////////////////////////////////////////////
?>
