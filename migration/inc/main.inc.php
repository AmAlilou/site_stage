<?php
/***** Script à inclure en entete de chaque fichier php du site *****/

require_once("inc/config.inc.php");
if((!isset($ROOT_PATH)) || (!isset($CLASS_DIRS)) || (!isset($URL_ROOT_PATH)))
    die("Erreur !.. Il manque la déclaration de \$ROOT_PATH, \$CLASS_DIRS ou \$URL_ROOT_PATH dans inc/config.inc.php !... regardez votre config.inc.php.exemple !");
    
// Chargement "en mémoire" de toutes les classes des répertoires dans $CLASS_DIRS et $PRIOR_CLASSES
// Commenter ceci si vous voulez charger "ponctuellement" les classes dont vous avez besoin
// (comme c'est, toutes les classes sont chargées et rendues disponibles dans toutes les pages)
foreach($PRIOR_CLASSES as $classFile)
    require_once($classFile);

    
// On "évite" de faire des "require" sur les classes "prioritaires"
$EXCEPT_CLASSES = array();
foreach($PRIOR_CLASSES as $classFile)
    $EXCEPT_CLASSES[count($EXCEPT_CLASSES)] = substr(strrchr($classFile, "/"), 1);

foreach($CLASS_DIRS as $dir){
    $handle = opendir($ROOT_PATH."/".$dir);

    while($file = readdir($handle)){
        if((substr($file, -10) == ".class.php") && (!in_array($file, $EXCEPT_CLASSES)))
            require_once($dir.$file);
    }
    
    closedir($handle);
}

// Démarrage des sessions
SessionManager::startSession();

// Spécification du connecteur a la base de données : ici un connecteur MySQL (possibilité d'implémenter d'autres connecteurs ...)


require_once($ROOT_PATH."/inc/dbconfig.inc.php");

// Initialisation de la base de données (création des tables éventuelle)
require_once($ROOT_PATH."/inc/DataBaseCreation.inc.php");

// Chargement des fonctions se trouvant dans /inc/functions.inc.php
require_once($ROOT_PATH."/inc/functions.inc.php");

// Permet de bufferiser la sortie standard et d'appeler, lors de l'appel final, la fonction displayBufferContent() (dans inc/functions.inc.php)
if(!isset($SKIP_OB_START))
    ob_start("displayBufferContent");
?>
