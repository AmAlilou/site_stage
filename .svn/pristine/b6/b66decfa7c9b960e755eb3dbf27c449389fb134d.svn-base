<?php
////// FICHIER A RENOMMER EN config.inc.php une fois édité ! /////

////////// RACINE DU SITE EN LOCAL: A CHANGER !! /////////////////
$ROOT_PATH = "/home/webmiage/www/stages/migration";
//////////////////////////////////////////////////////////////////

//////// RACINE DU SITE DES STAGES(NOUVEAU): A CHANGER !! ////////
$ROOT_PATH_STAGES = "/home/webmiage/www/stages";
//////////////////////////////////////////////////////////////////

/////////// RACINE DU SITE (HTTP): A CHANGER !! //////////////////
$URL_ROOT_PATH = "https://miage.emi.u-bordeaux1.fr/prod/stages/migration";
//////////////////////////////////////////////////////////////////

///////////////// Classes a inclure "en priorité" ////////////////
// Ces classes sont rajoutées pour éviter des problemes d'include
// entre le module de migration de la base et le module du nouveau
// site
$PRIOR_CLASSES = array(
        "class/DBConnector.class.php",
        $ROOT_PATH_STAGES."/class/ISelectable.class.php",
        $ROOT_PATH_STAGES."/class/DBConnectors/MySQLConnector.class.php"
        );
//////////////////////////////////////////////////////////////////

//////// Répertoires du site à "chercher" pour les classes ///////
$CLASS_DIRS = array(
        "class/",
        "class/DBClasses/",
        "class/DBConnectors/",
        // Répertoire des classes de la base migrée
        "../class/",
        "../class/DBClasses/"
        );
//////////////////////////////////////////////////////////////////
?>
