<?php

set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo '<h2>Accueil de la gestion des soutenances</h2>' ;

echo aideGestionSoutenance() ;
?>